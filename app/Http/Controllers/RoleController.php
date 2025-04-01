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
                $permission = Permission::firstOrCreate(['name' => $permissionName]);

                $actionsToStore = [
                    'can_read' => isset($actions['read']) ? true : false,
                    'can_write' => isset($actions['write']) ? true : false,
                    'can_create' => isset($actions['create']) ? true : false,
                    'can_delete' => isset($actions['delete']) ? true : false,
                ];

                $permissionsToAttach[] = [
                    'permission_id' => $permission->id,
                    'role_id' => $role->id,
                    'can_read' => $actionsToStore['can_read'],
                    'can_write' => $actionsToStore['can_write'],
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
            Log::error('Erreur lors de la création du rôle : ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all(),
            ]);

            return response()->json([
                'error' => 'Une erreur est survenue lors de la création du rôle.',
            ], 500);
        }
    }


    public function edit(Request $request, Role $role)
    {
        $customMessages = [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'name.unique' => 'Ce rôle existe déjà.',
        ];

        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        ], $customMessages);

        $role->name = strtoupper($request->name);
        $role->save();

        return response()->json([
            'message' => 'Rôle mis à jour avec succès.',
        ], 200);
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

    //PERMISSIONS
    // public function permission(Role $role)
    // {
    //     $permissions = $role->permissions()->paginate(10);
    //     return view('roles.permission.datapart', [
    //         'permissions' => $permissions,
    //     ]);
    // }
    // public function ajouterPermission(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'role_id' => 'required|integer|exists:roles,id',
    //     ],[
    //         'name.required' => 'La permission est obligatoire.',
    //         'name.max' => 'Le champ permission ne peut pas dépasser 255 caractères.',
    //         'role_id.required' => 'Le rôle est obligatoire.',
    //         'role_id.exists' => 'Le rôle sélectionné est invalide.',
    //     ]);

    //     try {
    //         $role = Role::findOrFail($validated['role_id']);

    //         $permission = Permission::where('name', $validated['name'])->first();
    //         if (!$permission) {
    //             return response()->json([
    //                 'message' => 'Cette permission n\'existe pas. Veuillez l\'ajouter d\'abord.',
    //                 'success' => false
    //             ], 400);
    //         }

    //         if ($role->hasPermissionTo($permission)) {
    //             return response()->json([
    //                 'message' => 'Cette permission est déjà attribuée à ce rôle.',
    //                 'success' => false
    //             ], 400);
    //         }

    //         $role->givePermissionTo($permission);

    //         return response()->json([
    //             'message' => 'Permission ajoutée avec succès !',
    //             'success' => true,
    //         ], 200);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'message' => 'Une erreur s\'est produite.',
    //             'success' => false,
    //             'error' => $e->getMessage(),
    //         ], 500);
    //     }
    // }


    //REPORTING
    public function export(Request $request)
    {
        if ($request->input('format') === 'excel') {
            return Excel::download(new RolesExport, 'roles.xlsx');
        }
    }
}
