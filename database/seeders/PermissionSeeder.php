<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'PATIENT MANAGEMENT',
            'ALL ACCESS'
        ];

        foreach ($permissions as $permission) {
            if (!Permission::whereRaw('UPPER(name) = ?', strtoupper($permission))->exists()) {
                Permission::create(['name' => strtoupper($permission)]);
            }
        }
    }
}
