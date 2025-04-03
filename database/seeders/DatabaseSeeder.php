<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\SpecialiteSeeder;
use Database\Seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SpecialiteSeeder::class,
            ServiceSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            ProfessionSeeder::class,
            
        ]);
    }
}
