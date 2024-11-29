<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ApiResponse;
use App\Models\Distribusi;
use App\Models\Penyimpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DistribusiController extends Controller
{
    public function index()
    {
        $distribusi = Distribusi::all();

        return ApiResponse::success($distribusi);
    }

    public function store(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'IDBarang' => 'required',
                'IDPosko' => 'required',
                'Jumlah' => 'required|integer',
                'TanggalDistribusi' => 'required|date'
            ]);

            if ($validator->fails()) {
                return ApiResponse::badRequest(['errors' => $validator->errors()]);
            }

            DB::beginTransaction();

            $stok = Penyimpanan::query()->where('IDBarang', $request->IDBarang)->firstOrFail();

            if ($stok->Jumlah < $request->Jumlah) {
                return ApiResponse::badRequest(['error' => 'Jumlah stok tidak cukup']);
            }

            $distribusi = Distribusi::query()->create([
                'IDPosko' => $request->IDPosko,
                'IDBarang' => $request->IDBarang,
                'Jumlah' => $request->Jumlah,
                'TanggalDistribusi' => $request->TanggalDistribusi,
                'LastUpdateBy' => $request->user()->IDPengguna,
            ]);

            $stok->decrement('Jumlah', $request->Jumlah);

            DB::commit();
            return ApiResponse::created($distribusi);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::badRequest($th);
        }
    }
}
