<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ApiResponse;
use App\Models\Kecamatan;

class KecamatanController extends Controller
{
    public function index()
    {
        return ApiResponse::success(Kecamatan::query()->orderBy('Nama')->get());
    }

    public function desa(string $id)
    {
        $kecamatan = Kecamatan::query()->find($id);

        return ApiResponse::success($kecamatan->desa()->orderBy('Nama')->get());
    }
}
