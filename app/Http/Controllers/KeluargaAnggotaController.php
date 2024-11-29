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

        $anggota = AnggotaKeluarga::create([
            'IDKeluarga' => $idKeluarga,
            'IDPenduduk' => $request->IDPenduduk,
            'Hubungan' => $request->Hubungan,
            'LastUpdateBy' => $request->user()->IDPengguna,
        ]);

        return ApiResponse::created($anggota);
    }
}
