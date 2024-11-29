<?php

namespace Database\Seeders;

use App\Models\Donatur\Donatur;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DonaturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan banyak data sekaligus
        Donatur::insert([
            [
                'IDDonatur' => Str::uuid(),
                'NamaPerusahaan' => 'PT Amal Sejahtera',
                'NamaKontak' => 'Budi Santoso',
                'NomorKontak' => '08123456789',
                'Alamat' => 'Jl. Kebajikan No. 12, Jakarta',
                'LastUpdateBy' => User::query()->inRandomOrder()->first()->IDPengguna,
            ],
            [
                'IDDonatur' => Str::uuid(),
                'NamaPerusahaan' => 'Yayasan Harapan Baru',
                'NamaKontak' => 'Dewi Kartika',
                'NomorKontak' => '08198765432',
                'Alamat' => 'Jl. Melati No. 5, Bandung',
                'LastUpdateBy' => User::query()->inRandomOrder()->first()->IDPengguna,
            ],
            [
                'IDDonatur' => Str::uuid(),
                'NamaPerusahaan' => 'CV Sumbangan Kita',
                'NamaKontak' => 'Andi Firmansyah',
                'NomorKontak' => '08562345678',
                'Alamat' => 'Jl. Mawar No. 45, Surabaya',
                'LastUpdateBy' => User::query()->inRandomOrder()->first()->IDPengguna,
            ],
            [
                'IDDonatur' => Str::uuid(),
                'NamaPerusahaan' => 'Donasi Peduli Bangsa',
                'NamaKontak' => 'Ratna Sari',
                'NomorKontak' => '082134567890',
                'Alamat' => 'Jl. Kenangan No. 21, Yogyakarta',
                'LastUpdateBy' => User::query()->inRandomOrder()->first()->IDPengguna,
            ],
            [
                'IDDonatur' => Str::uuid(),
                'NamaPerusahaan' => 'PT Dermawan Utama',
                'NamaKontak' => 'Sugeng Widodo',
                'NomorKontak' => '081345678901',
                'Alamat' => 'Jl. Pahlawan No. 9, Semarang',
                'LastUpdateBy' => User::query()->inRandomOrder()->first()->IDPengguna,
            ],
            [
                'IDDonatur' => Str::uuid(),
                'NamaPerusahaan' => 'Yayasan Tangan Di Atas',
                'NamaKontak' => 'Siti Aisyah',
                'NomorKontak' => '081234567800',
                'Alamat' => 'Jl. Kebaikan No. 15, Medan',
                'LastUpdateBy' => User::query()->inRandomOrder()->first()->IDPengguna,
            ],
            [
                'IDDonatur' => Str::uuid(),
                'NamaPerusahaan' => 'Bantuan Sosial Kita',
                'NamaKontak' => 'Hendrik Pratama',
                'NomorKontak' => '081111222333',
                'Alamat' => 'Jl. Mawar Merah No. 2, Makassar',
                'LastUpdateBy' => User::query()->inRandomOrder()->first()->IDPengguna,
            ],
            [
                'IDDonatur' => Str::uuid(),
                'NamaPerusahaan' => 'Donasi Abadi',
                'NamaKontak' => 'Linda Wati',
                'NomorKontak' => '081222333444',
                'Alamat' => 'Jl. Sejahtera No. 10, Malang',
                'LastUpdateBy' => User::query()->inRandomOrder()->first()->IDPengguna,
            ],
            [
                'IDDonatur' => Str::uuid(),
                'NamaPerusahaan' => 'Sumbangan Nusantara',
                'NamaKontak' => 'Rahmat Hidayat',
                'NomorKontak' => '082333444555',
                'Alamat' => 'Jl. Indonesia Bersatu No. 17, Bali',
                'LastUpdateBy' => User::query()->inRandomOrder()->first()->IDPengguna,
            ],
            [
                'IDDonatur' => Str::uuid(),
                'NamaPerusahaan' => 'Yayasan Berkah Bersama',
                'NamaKontak' => 'Nurul Fadilah',
                'NomorKontak' => '083444555666',
                'Alamat' => 'Jl. Surya No. 8, Bogor',
                'LastUpdateBy' => User::query()->inRandomOrder()->first()->IDPengguna,
            ],
        ]);
    }
}
