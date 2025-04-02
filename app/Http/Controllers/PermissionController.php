<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PermissionCustom;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::with('roles')->paginate(10);
        if ($request->ajax()) {
            $search = $request->input('search', '');
            $permissions = PermissionCustom::with('roles')->filter($search)->paginate(10);
            return view('permission.datapart', ['permissions' => $permissions]);
        }

        return view('permission.index', [
            'permissions' => $permissions
        ]);
    }
    public function create(Request $request)
    {
        $customMessages = [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'name.unique' => 'Cette permission existe déjà.',
        ];

        try {

            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:permissions,name',
            ], $customMessages);


            $permissionName = strtoupper($validated['name']);

            $existingPermission = Permission::whereRaw('LOWER(name) = ?', [strtolower($permissionName)])->exists();
            if ($existingPermission) {
                return response()->json([
                    'errors' => [
                        'name' => ['Cette permission existe déjà.'],
                    ],
                ], 422);
            }

            Permission::create([
                'id' => Str::uuid(),
                'name' => $permissionName,
            ]);

            return response()->json([
                'message' => 'Permission créée avec succès.',
                'success' => true,

            ], 201);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la permission', [
                'message' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
            ]);
            return response()->json([
                'message' => 'Une erreur est survenue lors de la création de la permission.',
                'success' => false,

            ], 500);
        }
    }

    public function update(Permission $permission, Request $request)
    {

        $request->validate([
            'name' => 'required|string|unique:permissions,name,' . $permission->id,
        ], [
            'name.required' => 'Le champ nom est obligatoire.',
            'name.string' => 'Le champ nom doit être une chaîne de caractères.',
            'name.unique' => 'Ce nom de permission existe déjà.',
        ]);

        $permission->update(['name' => strtoupper($request->name)]);

        return response()->json([
            'message' => 'Permission mise à jour avec succès.',
            'success' => true,
        ], 200);
    }
    public function delete(Permission $permission)
    {
        $permission->delete();
        return response()->json(['message' => 'Permission supprimé avec succès.'], 200);
    }
}
