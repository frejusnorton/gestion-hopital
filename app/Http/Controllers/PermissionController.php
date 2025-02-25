<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index (){
        $permissions = Permission::paginate(10);
        return view('permission.index',[
            'permissions' => $permissions
        ]);
    }
    public function create(Request $request)
    {
        dd('in');
        $customMessages = [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'name.unique' => 'Cette permission existe déjà.',
        ];
    
        try {
            // Validation des données
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:permissions,name',
            ], $customMessages);
    
            // Mettre le nom en majuscules
            $permissionName = strtoupper($validated['name']);
    
            // Vérifier si la permission existe déjà (insensible à la casse)
            $existingPermission = Permission::whereRaw('LOWER(name) = ?', [strtolower($permissionName)])->exists();
            if ($existingPermission) {
                return response()->json([
                    'errors' => [
                        'name' => ['Cette permission existe déjà.'],
                    ],
                ], 422);
            }
    
            // Création de la permission
            $permission = Permission::create([
                'name' => $permissionName,
            ]);
    
            return response()->json([
                'message' => 'Permission créée avec succès.',
                'success' => true,
                'permission' => $permission,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la création de la permission.',
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
}
