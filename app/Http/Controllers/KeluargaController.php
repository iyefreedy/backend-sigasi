<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ApiResponse;
use App\Models\Keluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class KeluargaController extends Controller
{
    public function index()
    {
        $idDesa = request()->get('desa');
        $idKecamatan = request()->get('kecamatan');

        if (request()->get('q')) {
            return ApiResponse::success(Keluarga::query()->where('NomorKK', 'LIKE', request()->get('q') . '%')->orderBy('LastUpdateBy', 'DESC')->get());
        }

        if ($idDesa != null && $idKecamatan) {
            return ApiResponse::success(Keluarga::where('IDDesa', $idDesa)->where('IDKecamatan', $idKecamatan)->orderBy('LastUpdateBy', 'DESC')->get());
        }

        return ApiResponse::success(Keluarga::all());
    }

    public function show(string $id)
    {
        $keluarga = Keluarga::with(['anggota'])->findOrFail($id);

        return ApiResponse::success($keluarga);
    }

    public function store(Request $request)
    {

        Log::debug($request->all());
        $keluarga = Keluarga::create([
            'IDKeluarga' => $request->IDKeluarga ?? Str::uuid(),
            'NomorKK' => $request->NomorKK,
            'Alamat' => $request->Alamat,
            'IDKecamatan' => $request->IDKecamatan,
            'IDDesa' => $request->IDDesa,
            'LastUpdateBy' => $request->user()->IDPengguna
        ]);

        return ApiResponse::created($keluarga);
    }
}
