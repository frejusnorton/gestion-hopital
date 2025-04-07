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
            'MÉDECINE GÉNÉRALE',
            'CHIRURGIE',
            'ANESTHÉSIE',
            'RADIOLOGIE',
            'URGENCES',
            'GYNÉCOLOGIE',
            'PÉDIATRIE',
            'PSYCHIATRIE',
            'RÉANIMATION',
            'ORTHOPÉDIE',
            'CARDIOLOGIE',
            'NÉPHROLOGIE',
            'DERMATOLOGIE',
            'OPHTALMOLOGIE',
            'NEUROLOGIE',
            'ENDOCRINOLOGIE',
            'KINÉSITHÉRAPIE',
            'PHARMACIE',
            'LABORATOIRE',
            'NUTRITION CLINIQUE',
            'SERVICE DE STÉRILISATION',
            'CONSULTATIONS EXTERNES',
            'MÉDECINE DU TRAVAIL',
            'VACCINATION',
            'CENTRE DE RÉÉDUCATION',
            'SERVICE DE CHIRURGIE PLASTIQUE',
            'DERMATOLOGIE PÉDIATRIQUE',
            'CONSULTATIONS D’INFERTILITÉ',
            'RÉÉDUCATION RESPIRATOIRE'
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
