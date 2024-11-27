<?php

namespace Database\Seeders;

use App\Models\Posko\Posko;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoskoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Posko::create([
            'IDKetua' => User::query()->inRandomOrder()->first()->IDPengguna,
            'Lokasi' => 'Posko 1',
            'Masalah' => 'Kekurangan logistik makanan.',
            'SolusiMasalah' => 'Mengajukan bantuan tambahan kepada donatur lokal dan menyusun jadwal distribusi makanan dengan prioritas kebutuhan mendesak.'
        ]);

        Posko::create([
            'IDKetua' => User::query()->inRandomOrder()->first()->IDPengguna,
            'Lokasi' => 'Posko 2',
            'Masalah' => 'Akses jalan menuju posko terhambat oleh banjir.',
            'SolusiMasalah' => 'Koordinasi dengan relawan dan dinas terkait untuk menyediakan perahu atau rakit sementara hingga kondisi membaik.'
        ]);

        Posko::create([
            'IDKetua' => User::query()->inRandomOrder()->first()->IDPengguna,
            'Lokasi' => 'Posko 3',
            'Masalah' => 'Kurangnya tenaga medis untuk menangani pengungsi yang sakit.',
            'SolusiMasalah' => 'Meminta dukungan dari Dinas Kesehatan setempat atau menghubungi organisasi kemanusiaan untuk mendatangkan tenaga medis.'
        ]);

        Posko::create([
            'IDKetua' => User::query()->inRandomOrder()->first()->IDPengguna,
            'Lokasi' => 'Posko 4',
            'Masalah' => 'Kendala komunikasi antarposko karena jaringan telekomunikasi terganggu.',
            'SolusiMasalah' => 'Menggunakan radio komunikasi atau membangun hotspot jaringan sementara di area posko.'
        ]);

        Posko::create([
            'IDKetua' => User::query()->inRandomOrder()->first()->IDPengguna,
            'Lokasi' => 'Posko 5',
            'Masalah' => 'Kekurangan air bersih.',
            'SolusiMasalah' => 'Memasang tangki air bersih portable dan mengelola distribusi air bersih secara terjadwal.'
        ]);
    }
}
