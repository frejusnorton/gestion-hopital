<?php

namespace App\Http\Requests;


use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request)
    {
    
        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'identifiant' => 'required|string|max:255|unique:users,identifiant',
            'matricule' => 'required|string|max:255|unique:users,matricule',
            'profession' => 'required|exists:professions,id',
            'service' => 'required|exists:services,id',
            'email' => 'required|email|unique:users,email',
            'sexe' => 'required|in:M,F',
            'profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'identifiant.required' => "L'identifiant est obligatoire.",
            'identifiant.unique' => "Cet identifiant est déjà utilisé.",
            'matricule.required' => 'Le matricule est obligatoire.',
            'matricule.unique' => 'Ce matricule est déjà utilisé.',
            'profession.required' => 'La profession est obligatoire.',
            'profession.exists' => 'La profession sélectionnée est invalide.',
            'service.required' => 'Le service est obligatoire.',
            'service.exists' => 'Le service sélectionné est invalide.',
            'email.required' => "L'adresse e-mail est obligatoire.",
            'email.email' => "L'adresse e-mail doit être valide.",
            'email.unique' => "Cette adresse e-mail est déjà utilisée.",
            'sexe.required' => 'Le sexe est obligatoire.',
            'sexe.in' => 'Le sexe doit être soit "homme" soit "femme".',
            'profil.image' => 'Le fichier doit être une image.',
            'profil.mimes' => 'Le fichier doit être au format jpeg, png ou jpg.',
            'profil.max' => 'La taille de l’image ne doit pas dépasser 2 Mo.',
        ];
    }
}
