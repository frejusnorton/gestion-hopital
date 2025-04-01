<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialites;

class SpecialitesController extends Controller
{
    public function index(Request $request)
    {
        $specialite_medecin = Specialites::paginate(10);

        return view('specialite-medecin.index', [
            'specialites_medecins' =>  $specialite_medecin
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
            'nom' => 'required|string|max:255|unique:specialite_medecins,nom',
        ], $customMessages);


        $specialiteName = strtoupper($request->nom);
        $existingRole = Specialites::whereRaw('LOWER(name) = ?', [strtolower($specialiteName)])->exists();
        if ($existingRole) {
            if ($existingRole) {
                return response()->json([
                    'errors' => [
                        'name' => ['Ce rôle existe déjà.'],
                    ],
                ], 422);
            }
        }
        $role = Specialites::create([
            'nom' =>   $specialiteName,
        ]);

        return response()->json([
            'message' => 'Rôle créé avec succès.',
        ], 201);
    }
}
