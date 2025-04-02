<?php

namespace App\Http\Controllers;


use App\Models\RoleCustom;
use Illuminate\Support\Str;
use App\Exports\RolesExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\ValidationException;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::with('permissions')->paginate(10);
        $permissions = Permission::paginate(10);

        $rolesWithUserCount = Role::withCount('users')->get()->keyBy('id');

        if ($request->ajax()) {
            $search = $request->input('search', '');
            $roles = RoleCustom::filter($search)->paginate(10);
            return view('roles.datapart', ['roles' => $roles]);
        }


        return view('roles.index', [
            'roles' => $roles,
            'rolesWithUserCount' => $rolesWithUserCount,
            'permissions' => $permissions,
        ]);
    }
    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $customMessages = [
                'name.required' => 'Le nom est obligatoire.',
                'name.string' => 'Le nom doit être une chaîne de caractères.',
                'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
                'name.unique' => 'Ce rôle existe déjà.',
                'permissions.required' => 'Vous devez choisir les permissions du rôle',
            ];

            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:roles,name',
                'permissions' => 'required|array',
            ], $customMessages);

            $roleName = strtoupper($request->name);

            if (Role::whereRaw('LOWER(name) = ?', [strtolower($roleName)])->exists()) {
                return response()->json([
                    'errors' => ['name' => ['Ce rôle existe déjà.']],
                ], 422);
            }

            $role = Role::create([
                'id' => Str::uuid(),
                'name' => $roleName,
            ]);

            $permissions = $request->input('permissions');
            $permissionsToAttach = [];

            foreach ($permissions as $permissionName => $actions) {
                $normalizedPermissionName = strtoupper($permissionName);
                $permission = Permission::whereRaw('UPPER(name) = ?', [$normalizedPermissionName])->first();

                if (!$permission) {
                    $permission = Permission::create(['name' => $permissionName]);
                }
                $actionsToStore = [
                    'can_read' => isset($actions['read']) ? true : false,
                    'can_update' => isset($actions['update']) ? true : false,
                    'can_create' => isset($actions['create']) ? true : false,
                    'can_delete' => isset($actions['delete']) ? true : false,
                ];

                $permissionsToAttach[] = [
                    'permission_id' => $permission->id,
                    'role_id' => $role->id,
                    'can_read' => $actionsToStore['can_read'],
                    'can_update' => $actionsToStore['can_update'],
                    'can_create' => $actionsToStore['can_create'],
                    'can_delete' => $actionsToStore['can_delete'],
                ];
            }
            foreach ($permissionsToAttach as $data) {
                DB::table('role_has_permissions')->insert($data);
            }
            DB::commit();
            return response()->json([
                'message' => 'Rôle créé avec succès avec ses permissions.',
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Une erreur est survenue lors de la mise à jour du rôle.',
            ], 500);
        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Erreur de validation',
                'errors' => $e->errors(),
            ], 422);
        }
    }


    public function edit(Request $request, Role $role)
    {
        DB::beginTransaction();
        try {
            $customMessages = [
                'name.required' => 'Le nom est obligatoire.',
                'name.string' => 'Le nom doit être une chaîne de caractères.',
                'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
                'name.unique' => 'Ce rôle existe déjà.',
                'permissions.required' => 'Vous devez choisir les permissions du rôle',
            ];

            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
                'permissions' => 'required|array',
            ], $customMessages);

            $roleName = strtoupper($request->name);

            if (Role::whereRaw('LOWER(name) = ?', [strtolower($roleName)])
                ->where('id', '!=', $role->id)
                ->exists()
            ) {
                return response()->json([
                    'errors' => ['name' => ['Ce rôle existe déjà.']],
                ], 422);
            }

            $role->update(['name' => $roleName]);
            DB::table('role_has_permissions')->where('role_id', $role->id)->delete();

            // Gestion des nouvelles permissions
            $permissions = $request->input('permissions');
            $permissionsToAttach = [];

            foreach ($permissions as $permissionName => $actions) {
                $normalizedPermissionName = strtoupper($permissionName);
                $permission = Permission::whereRaw('UPPER(name) = ?', [$normalizedPermissionName])->first();

                if (!$permission) {
                    $permission = Permission::create(['name' => $permissionName]);
                }

                $permissionsToAttach[] = [
                    'permission_id' => $permission->id,
                    'role_id' => $role->id,
                    'can_read' => isset($actions['read']) ? true : false,
                    'can_update' => isset($actions['update']) ? true : false,
                    'can_create' => isset($actions['create']) ? true : false,
                    'can_delete' => isset($actions['delete']) ? true : false,
                ];
            }

            DB::table('role_has_permissions')->insert($permissionsToAttach);
            DB::commit();

            return response()->json([
                'message' => 'Rôle mis à jour avec succès avec ses permissions.',
            ], 200);
        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Erreur de validation',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Une erreur est survenue lors de la mise à jour du rôle.',
            ], 500);
        }
    }



    public function delete(Role $role)
    {
        $role->delete();
        return response()->json(['message' => 'Rôle supprimé avec succès.'], 200);
    }


    public function details(Role $role)
    {
        $rolesWithUserCount = Role::withCount('users')->get()->keyBy('id');
        $role->load(['permissions', 'users']);
        return view('roles.details', [
            'role' => $role,
            'rolesWithUserCount' => $rolesWithUserCount,
        ]);
    }

   
    public function export(Request $request)
    {
        if ($request->input('format') === 'excel') {
            return Excel::download(new RolesExport, 'roles.xlsx');
        }
    }
}
