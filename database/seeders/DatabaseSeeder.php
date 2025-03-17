<?php

namespace Database\Seeders;

use App\Models\SpecialiteMedecin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ServiceSeeder::class,
            SpecialiteMedecin::class,
        ]);
    }
}
