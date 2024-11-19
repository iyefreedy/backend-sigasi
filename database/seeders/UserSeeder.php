<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $posko_utama = User::query()->create([
            'Nama' => 'posko utama',
            'Username' => 'posko_utama',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);

        $posko_utama->assignRole('Posko Utama');

        $posko = User::create([
            'Nama' => 'posko',
            'Username' => 'posko',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);

        $posko->assignRole('Posko');

        $bansos = User::create([
            'Nama' => 'bansos',
            'Username' => 'bansos',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);

        $bansos->assignRole('bansos');

        $kecamatan = User::create([
            'Nama' => 'kecamatan',
            'Username' => 'kecamatan',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);

        $kecamatan->assignRole('kecamatan');
    }
}
