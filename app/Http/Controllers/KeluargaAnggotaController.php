<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ApiResponse;
use App\Models\AnggotaKeluarga;
use App\Models\Keluarga;
use App\Models\Penduduk\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeluargaAnggotaController extends Controller
{
    public function index(string $idKeluarga)
    {
        $keluarga = Keluarga::query()->findOrFail($idKeluarga);

        return ApiResponse::success($keluarga);
    }

    public function store(string $idKeluarga, Request $request)
    {
        $penduduk = Penduduk::create([
            'KTP' => $request->KTP,
            'Nama' => $request->Nama,
            'TanggalLahir' => $request->TanggalLahir,
            'JenisKelamin' => $request->JenisKelamin,
            'Alamat' => $request->Alamat,
            'IDDesa' => $request->IDDesa,
            'IDKecamatan' => $request->IDKecamatan,
            'IDKelompok' => $request->IDKelompok,
            'LastUpdateBy' => $request->user()->IDPengguna,
        ]);
        $anggota = AnggotaKeluarga::create([
            'IDKeluarga' => $idKeluarga,
            'IDPenduduk' => $penduduk->IDPenduduk,
            'Hubungan' => $request->Hubungan,
            'LastUpdateBy' => $request->user()->IDPengguna,
        ]);

        return ApiResponse::created($anggota);
    }
}
