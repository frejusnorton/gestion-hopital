<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use App\Models\RoleCustom;
use App\Exports\RolesExport;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::paginate(10);
        $permissions = Permission::paginate(10);

        if ($request->ajax()) {
            $search = $request->input('search', '');
            $roles = RoleCustom::filter($search)->paginate(10);
            return view('roles.datapart', ['roles' => $roles]);
        }
        return view('roles.index', [
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }
    public function create(Request $request)
    {
        $customMessages = [
            'name.required' => 'Le  nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'name.unique' => 'Ce rôle existe déjà.',
        ];
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ], $customMessages);


        $roleName = strtoupper($request->name);


        $existingRole = Role::whereRaw('LOWER(name) = ?', [strtolower($roleName)])->exists();
        if ($existingRole) {
            if ($existingRole) {
                return response()->json([
                    'errors' => [
                        'name' => ['Ce rôle existe déjà.'],
                    ],
                ], 422);
            }
        }
        $role = Role::create([
            'name' =>   $roleName,
        ]);

        return response()->json([
            'message' => 'Rôle créé avec succès.',
        ], 201);
    }

    public function edit(Request $request, Role $role)
    {
        $customMessages = [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'name.unique' => 'Ce rôle existe déjà.',
        ];
        $validated = $request->validate([
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
