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
            ['id' => Str::uuid(), 'nom' => 'Urgences', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Réanimation', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Anesthésie-Réanimation', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Médecine générale', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Cardiologie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Pneumologie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Neurologie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Gastro-entérologie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Endocrinologie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Dermatologie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Rhumatologie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Oncologie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Néphrologie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Médecine interne', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Chirurgie générale', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Chirurgie orthopédique', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Chirurgie cardiovasculaire', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Chirurgie digestive', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Chirurgie urologique', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Chirurgie gynécologique', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Neurochirurgie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Chirurgie pédiatrique', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Chirurgie plastique et reconstructrice', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Gynécologie-obstétrique', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Pédiatrie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Neonatalogie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Radiologie et Imagerie médicale', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Laboratoire d’analyses médicales', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Pharmacie hospitalière', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Psychiatrie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Ophtalmologie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'ORL (Oto-Rhino-Laryngologie)', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Stomatologie et dentisterie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Kinésithérapie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Ergothérapie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Orthophonie', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Médecine physique et réadaptation', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Administration et gestion hospitalière', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Service social', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
            ['id' => Str::uuid(), 'nom' => 'Hygiène hospitalière', 'created_at' => Carbon::createFromDate(2025, 3, 17), 'updated_at' => Carbon::createFromDate(2025, 3, 17)],
        ];
        
        DB::table('services')->insert($services);
    }
}
