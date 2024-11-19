<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Permission::create(['name' => 'posko:create', 'guard_name' => 'api']);
        Permission::create(['name' => 'posko:view-any', 'guard_name' => 'api']);
        Permission::create(['name' => 'posko:view', 'guard_name' => 'api']);
        Permission::create(['name' => 'posko:update', 'guard_name' => 'api']);
        Permission::create(['name' => 'posko:delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'user:create', 'guard_name' => 'api']);
        Permission::create(['name' => 'user:view-any', 'guard_name' => 'api']);
        Permission::create(['name' => 'user:view', 'guard_name' => 'api']);
        Permission::create(['name' => 'user:update', 'guard_name' => 'api']);
        Permission::create(['name' => 'user:delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'satuan:create', 'guard_name' => 'api']);
        Permission::create(['name' => 'satuan:view-any', 'guard_name' => 'api']);
        Permission::create(['name' => 'satuan:view', 'guard_name' => 'api']);
        Permission::create(['name' => 'satuan:update', 'guard_name' => 'api']);
        Permission::create(['name' => 'satuan:delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'penduduk:create', 'guard_name' => 'api']);
        Permission::create(['name' => 'penduduk:view-any', 'guard_name' => 'api']);
        Permission::create(['name' => 'penduduk:view', 'guard_name' => 'api']);
        Permission::create(['name' => 'penduduk:update', 'guard_name' => 'api']);
        Permission::create(['name' => 'penduduk:delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'pengungsi:create', 'guard_name' => 'api']);
        Permission::create(['name' => 'pengungsi:view-any', 'guard_name' => 'api']);
        Permission::create(['name' => 'pengungsi:view', 'guard_name' => 'api']);
        Permission::create(['name' => 'pengungsi:update', 'guard_name' => 'api']);
        Permission::create(['name' => 'pengungsi:delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'bantuan:create', 'guard_name' => 'api']);
        Permission::create(['name' => 'bantuan:view-any', 'guard_name' => 'api']);
        Permission::create(['name' => 'bantuan:view', 'guard_name' => 'api']);
        Permission::create(['name' => 'bantuan:update', 'guard_name' => 'api']);
        Permission::create(['name' => 'bantuan:delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'donatur:create', 'guard_name' => 'api']);
        Permission::create(['name' => 'donatur:view-any', 'guard_name' => 'api']);
        Permission::create(['name' => 'donatur:view', 'guard_name' => 'api']);
        Permission::create(['name' => 'donatur:update', 'guard_name' => 'api']);
        Permission::create(['name' => 'donatur:delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'kebutuhan:create', 'guard_name' => 'api']);
        Permission::create(['name' => 'kebutuhan:view-any', 'guard_name' => 'api']);
        Permission::create(['name' => 'kebutuhan:view', 'guard_name' => 'api']);
        Permission::create(['name' => 'kebutuhan:update', 'guard_name' => 'api']);
        Permission::create(['name' => 'kebutuhan:delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'barang:create', 'guard_name' => 'api']);
        Permission::create(['name' => 'barang:view-any', 'guard_name' => 'api']);
        Permission::create(['name' => 'barang:view', 'guard_name' => 'api']);
        Permission::create(['name' => 'barang:update', 'guard_name' => 'api']);
        Permission::create(['name' => 'barang:delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'kelompok:create', 'guard_name' => 'api']);
        Permission::create(['name' => 'kelompok:view-any', 'guard_name' => 'api']);
        Permission::create(['name' => 'kelompok:view', 'guard_name' => 'api']);
        Permission::create(['name' => 'kelompok:update', 'guard_name' => 'api']);
        Permission::create(['name' => 'kelompok:delete', 'guard_name' => 'api']);
    }
}
