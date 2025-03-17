<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SpecialitesTableSeeder extends Seeder
{
    public function run()
    {
        $specialites = [
            'Médecine générale',
            'Cardiologie',
            'Pneumologie',
            'Neurologie',
            'Gastro-entérologie',
            'Endocrinologie',
            'Dermatologie',
            'Rhumatologie',
            'Oncologie',
            'Néphrologie',
            'Médecine interne',
            'Chirurgie générale',
            'Chirurgie orthopédique',
            'Chirurgie cardiovasculaire',
            'Chirurgie digestive',
            'Chirurgie urologique',
            'Chirurgie gynécologique',
            'Neurochirurgie',
            'Chirurgie pédiatrique',
            'Chirurgie plastique et reconstructrice',
            'Gynécologie-obstétrique',
            'Pédiatrie',
            'Néonatologie',
            'Radiologie et imagerie médicale',
            'Laboratoire d’analyses médicales',
            'Pharmacie hospitalière',
            'Psychiatrie',
            'Ophtalmologie',
            'ORL (Oto-Rhino-Laryngologie)',
            'Stomatologie et dentisterie',
            'Kinésithérapie',
            'Ergothérapie',
            'Orthophonie',
            'Médecine physique et réadaptation',
            'Médecine du travail',
            'Médecine légale',
            'Médecine palliative',
            'Médecine du sport',
            'Addictologie',
            'Santé publique'
        ];

        foreach ($specialites as $specialite) {
            DB::table('specialites')->insert([
                'id' => (string) Str::uuid(),  
                'nom' => $specialite,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

