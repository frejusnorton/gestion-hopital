<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $professions = [
            "MÉDECIN GÉNÉRALISTE", "CHIRURGIEN", "ANESTHÉSISTE", 
            "RADIOLOGUE", "URGENTISTE", "GYNÉCOLOGUE-OBSTÉTRICIEN", "PSYCHIATRE",
            "INFIRMIER", "AIDE-SOIGNANT", "SAGE-FEMME", "MANIPULATEUR EN RADIOLOGIE",
            "KINÉSITHÉRAPEUTE", "ERGOTHÉRAPEUTE", "ORTHOPHONISTE", "PSYCHOMOTRICIEN", "DIÉTÉTICIEN",
            "TECHNICIEN DE LABORATOIRE", "PHARMACIEN HOSPITALIER", "PRÉPARATEUR EN PHARMACIE",
            "BIOLOGISTE MÉDICAL", "DIRECTEUR D’HÔPITAL", "SECRÉTAIRE MÉDICAL", "GESTIONNAIRE DE DOSSIERS MÉDICAUX",
            "RESPONSABLE DES RESSOURCES HUMAINES", "COMPTABLE HOSPITALIER",
            "AMBULANCIER", "BRANCARDIER", "CUISINIER EN MILIEU HOSPITALIER", "AGENT DE MAINTENANCE",
            "SÉCURITÉ HOSPITALIÈRE"
        ];

        foreach ($professions as $profession) {
            DB::table('professions')->insert([
                'id' => Str::uuid(),
                'name' => $profession,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
