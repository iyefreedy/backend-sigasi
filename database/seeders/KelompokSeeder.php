<?php

namespace Database\Seeders;

use App\Models\Kelompok\Kelompok;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KelompokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelompokData = [
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Bayi', 'Keterangan' => '0 – 1 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Anak Balita', 'Keterangan' => '1 – 4 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Pra sekolah', 'Keterangan' => '5 – 6 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Anak usia SD/Setingkat', 'Keterangan' => '7 – 12 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Penduduk Usia Lanjut (pria)', 'Keterangan' => '≥ 60 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Penduduk Usia Lanjut (wanita)', 'Keterangan' => '≥ 60 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Penduduk Usia Lanjut Risiko Tinggi (pria)', 'Keterangan' => '≥ 70 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Penduduk Usia Lanjut Risiko Tinggi (wanita)', 'Keterangan' => '≥ 70 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Ibu Hamil', 'Keterangan' => 'Ibu hamil'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Ibu Bersalin/Nifas', 'Keterangan' => 'Mempunyai anak BADUTA (bawah dua tahun)'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Difabel kesulitan fisik', 'Keterangan' => 'Gangguan penglihatan, pendengaran, motorik (tangan/kaki).'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Difabel kesulitan memori dan emosi', 'Keterangan' => 'Kesulitan mengingat/berkonsentrasi, gangguan perilaku/emosional, berbicara, serta mengurus diri sendiri'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Non rentan pria', 'Keterangan' => '< 60 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Non rentan wanita', 'Keterangan' => '< 60 tahun'],
        ];

        // Create records in the database
        Kelompok::query()->insert($kelompokData);
    }
}
