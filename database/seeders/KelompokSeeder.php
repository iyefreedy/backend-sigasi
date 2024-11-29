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
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Anak Bayi', 'Keterangan' => '0 – 1 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Anak Balita', 'Keterangan' => '1 – 4 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Anak Pra sekolah', 'Keterangan' => '5 – 6 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Anak usia SD/Setingkat', 'Keterangan' => '7 – 12 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Difabel kesulitan fisik', 'Keterangan' => 'Gangguan penglihatan, pendengaran, motorik (tangan/kaki).'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Difabel kesulitan memori dan emosi', 'Keterangan' => 'Kesulitan mengingat/berkonsentrasi, gangguan perilaku/emosional, berbicara, serta mengurus diri sendiri'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Ibu Bersalin/Nifas', 'Keterangan' => 'Mempunyai anak BADUTA (bawah dua tahun)'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Ibu Hamil', 'Keterangan' => 'Ibu hamil'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Penduduk Non rentan (Pria)', 'Keterangan' => '< 60 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Penduduk Non rentan (Wanita)', 'Keterangan' => '< 60 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Penduduk Usia Lanjut (Wanita)', 'Keterangan' => '≥ 60 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Penduduk Usia Lanjut (Pria)', 'Keterangan' => '≥ 60 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Penduduk Usia Lanjut Risiko Tinggi (Wanita)', 'Keterangan' => '≥ 70 tahun'],
            ['IDKelompok' => Str::uuid(), 'NamaKelompok' => 'Penduduk Usia Lanjut Risiko Tinggi (Pria)', 'Keterangan' => '≥ 70 tahun'],
        ];

        // Create records in the database
        Kelompok::query()->insert($kelompokData);
    }
}
