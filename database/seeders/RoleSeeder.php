<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $roles = ['ADMINISTRATEUR'];

    foreach ($roles as $role) {
        Role::firstOrCreate(
            ['name' => strtoupper($role), 'guard_name' => 'web'],
            ['id' => Str::uuid()] 
        );
    }
}
}
