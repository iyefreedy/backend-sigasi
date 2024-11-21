<?php

namespace Database\Seeders;

use App\Models\Barang\Barang;
use App\Models\Barang\JenisBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $makanan = JenisBarang::create([
            'JenisBarang' => 'Makanan'
        ]);
        Barang::create([
            'IDJenisBarang' => $makanan->IDJenisBarang,
            'NamaBarang' => 'MPASI',
            'HargaSatuan' => 3500
        ]);
        Barang::create([
            'IDJenisBarang' => $makanan->IDJenisBarang,
            'NamaBarang' => 'Makanan Bayi',
            'HargaSatuan' => 4500
        ]);
        Barang::create([
            'IDJenisBarang' => $makanan->IDJenisBarang,
            'NamaBarang' => 'Biskuit Bayi',
            'HargaSatuan' => 2300
        ]);
        Barang::create([
            'IDJenisBarang' => $makanan->IDJenisBarang,
            'NamaBarang' => 'Mie Instan',
            'HargaSatuan' => 4000
        ]);
        Barang::create([
            'IDJenisBarang' => $makanan->IDJenisBarang,
            'NamaBarang' => 'Sarden',
            'HargaSatuan' => 8700
        ]);
        Barang::create([
            'IDJenisBarang' => $makanan->IDJenisBarang,
            'NamaBarang' => 'Roti',
            'HargaSatuan' => 3000
        ]);

        $minuman = JenisBarang::create([
            'JenisBarang' => 'Minuman'
        ]);
        Barang::create([
            'IDJenisBarang' => $minuman->IDJenisBarang,
            'NamaBarang' => 'Air Mineral',
            'HargaSatuan' => 3500
        ]);
        Barang::create([
            'IDJenisBarang' => $minuman->IDJenisBarang,
            'NamaBarang' => 'Susu Formula',
            'HargaSatuan' => 40000
        ]);

        $pakaian = JenisBarang::create([
            'JenisBarang' => 'Pakaian'
        ]);
        Barang::create([
            'IDJenisBarang' => $pakaian->IDJenisBarang,
            'NamaBarang' => 'Pakaian Pria',
            'HargaSatuan' => 100_000
        ]);
        Barang::create([
            'IDJenisBarang' => $pakaian->IDJenisBarang,
            'NamaBarang' => 'Pakaian Wanita',
            'HargaSatuan' => 200_000
        ]);
        Barang::create([
            'IDJenisBarang' => $pakaian->IDJenisBarang,
            'NamaBarang' => 'Pakaian Bayi',
            'HargaSatuan' => 50_000
        ]);

        $kebutuhanKhusus = JenisBarang::create([
            'JenisBarang' => 'Kebutuhan Khusus'
        ]);
        Barang::create([
            'IDJenisBarang' => $kebutuhanKhusus->IDJenisBarang,
            'NamaBarang' => 'Pampers Bayi',
            'HargaSatuan' => 100_000
        ]);
        Barang::create([
            'IDJenisBarang' => $kebutuhanKhusus->IDJenisBarang,
            'NamaBarang' => 'Pampers Dewasa',
            'HargaSatuan' => 200_000
        ]);
        Barang::create([
            'IDJenisBarang' => $kebutuhanKhusus->IDJenisBarang,
            'NamaBarang' => 'Selimut',
            'HargaSatuan' => 50_000
        ]);

        $obat = JenisBarang::create([
            'JenisBarang' => 'Obat dan Vitamin'
        ]);
        Barang::create([
            'IDJenisBarang' => $obat->IDJenisBarang,
            'NamaBarang' => 'Vitamin',
            'HargaSatuan' => 100_000
        ]);
        Barang::create([
            'IDJenisBarang' => $obat->IDJenisBarang,
            'NamaBarang' => 'Obat demam',
            'HargaSatuan' => 200_000
        ]);
        Barang::create([
            'IDJenisBarang' => $kebutuhanKhusus->IDJenisBarang,
            'NamaBarang' => 'Minyak Kayu putih',
            'HargaSatuan' => 50_000
        ]);
    }
}
