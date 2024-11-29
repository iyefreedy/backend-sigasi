<?php

namespace Database\Seeders\Roles;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $poskoUtama = Role::create(['name' => 'posko utama', 'guard_name' => 'api']);
        $poskoUtama->givePermissionTo('posko:create', 'posko:view-any', 'posko:view', 'kelompok:view-any');
        Role::create(['name' => 'posko', 'guard_name' => 'api']);
        Role::create(['name' => 'bansos', 'guard_name' => 'api']);
        Role::create(['name' => 'kecamatan', 'guard_name' => 'api']);
        Role::create(['name' => 'relawan', 'guard_name' => 'api']);
    }
}
