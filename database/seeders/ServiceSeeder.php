<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{

    public function run(): void
    {
        $services = [
            'Médecine générale',
            'Chirurgie',
            'Anesthésie',
            'Radiologie',
            'Urgences',
            'Gynécologie',
            'Pédiatrie',
            'Psychiatrie',
            'Réanimation',
            'Orthopédie',
            'Cardiologie',
            'Néphrologie',
            'Dermatologie',
            'Ophtalmologie',
            'Neurologie',
            'Endocrinologie',
            'Kinésithérapie',
            'Pharmacie',
            'Laboratoire',
            'Nutrition clinique',
            'Service de stérilisation',
            'Consultations externes',
            'Médecine du travail',
            'Vaccination',
            'Centre de rééducation',
            'Service de chirurgie plastique',
            'Dermatologie pédiatrique',
            'Consultations d’infertilité',
            'Rééducation respiratoire'
        ];
        
        foreach ($services as $service) {
            DB::table('services')->insert([
                'id' => Str::uuid(),
                'name' => $service,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
