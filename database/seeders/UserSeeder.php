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
            'Nama' => 'posko utama 1',
            'Username' => 'posko_utama1',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);
        $posko_utama->assignRole('posko Utama');

        $posko_utama = User::query()->create([
            'Nama' => 'posko utama 2',
            'Username' => 'posko_utama2',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);
        $posko_utama->assignRole('posko Utama');

        $posko_utama = User::query()->create([
            'Nama' => 'posko utama 3',
            'Username' => 'posko_utama3',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);
        $posko_utama->assignRole('posko Utama');

        $posko = User::create([
            'Nama' => 'Posko 1',
            'Username' => 'posko1',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);
        $posko->assignRole('posko');
        $posko = User::create([
            'Nama' => 'Posko 2',
            'Username' => 'posko2',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);
        $posko->assignRole('posko');
        $posko = User::create([
            'Nama' => 'Posko 3',
            'Username' => 'posko3',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);
        $posko->assignRole('posko');

        $bansos = User::create([
            'Nama' => 'Bansos 1',
            'Username' => 'bansos1',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);
        $bansos->assignRole('bansos');
        $bansos = User::create([
            'Nama' => 'Bansos 2',
            'Username' => 'bansos2',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);
        $bansos->assignRole('bansos');
        $bansos = User::create([
            'Nama' => 'Bansos 3',
            'Username' => 'bansos3',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);
        $bansos->assignRole('bansos');

        $kecamatan = User::create([
            'Nama' => 'Kecamatan 1',
            'Username' => 'kecamatan',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);
        $kecamatan->assignRole('kecamatan');
        $kecamatan = User::create([
            'Nama' => 'Kecamatan 2',
            'Username' => 'kecamatan2',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);
        $kecamatan->assignRole('kecamatan');
        $kecamatan = User::create([
            'Nama' => 'Kecamatan 3',
            'Username' => 'kecamatan3',
            'NomorKontak' => '081122334455',
            'KataSandi' => Hash::make('admin123'),
        ]);
        $kecamatan->assignRole('kecamatan');
    }
}
