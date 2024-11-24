<?php

namespace App\Http\Controllers\Api\Posko;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Models\Posko\Posko;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PoskoController extends Controller
{
    public function index()
    {
        $posko = Posko::with(['user'])->get(); // untuk dapatkan semua data posko, dengan dibatasi 10 data
        return ApiResponse::success($posko);
    }

    public function show($id)
    {
        // menampilkan data posko berdasarkan parameter id dengan relasi user
        $posko = Posko::with(['user'])->where('IDPosko', $id)->first();
        if (!$posko) { // jika posko tidak ada, maka masuk kondisi error
            return ApiResponse::badRequest('Data posko tidak ditemukan.');
        }

        return ApiResponse::success($posko); // data dari posko
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'IDPosko' => 'nullable',
                'IDKetua' => 'required',
                'Lokasi' => 'required',
                'Masalah' => 'required',
                'SolusiMasalah' => 'required',

            ]);

            if ($validator->fails()) { // jika ada parameter yang tidak sesuai maka muncul pesan error
                return ApiResponse::badRequest($validator->errors());
            }

            Log::debug($request->all());

            DB::beginTransaction(); // memulai data transaksi
            $posko = Posko::query()->updateOrCreate([
                'IDPosko' => $request->IDPosko,
            ], [
                'IDKetua' => $request->IDKetua,
                'Lokasi' => $request->Lokasi,
                'Masalah' => $request->Masalah,
                'SolusiMasalah' => $request->SolusiMasalah,
            ]);

            if ($posko) { // jika kondisi ada maka lakukan commit
                DB::commit();
                return ApiResponse::success($posko);
            } else { // jika datanya tidak ada, maka lakukan error
                DB::rollBack();
                return ApiResponse::badRequest('Data posko tidak dapat disimpan.');
            }
        } catch (Exception $e) {
            Log::error($e);
            return ApiResponse::badRequest('Data tidak dapat disimpan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'IDKetua' => 'required',
                'Lokasi' => 'required',
                'Masalah' => 'required',
                'SolusiMasalah' => 'required',

            ]);

            if ($validator->fails()) {
                return ApiResponse::badRequest($validator->errors());
            }

            DB::beginTransaction();
            $posko = Posko::where('IDPosko', $id)->lockForUpdate()->update([ // update data berdasarkan id posko
                'IDKetua' => $request->IDKetua,
                'Lokasi' => $request->Lokasi,
                'Masalah' => $request->Masalah,
                'SolusiMasalah' => $request->SolusiMasalah,

            ]);
            if ($posko) { // jika hasilnya true maka lakukan commit
                DB::commit();
                $data_posko =  Posko::with(['user'])->where('IDPosko', $id)->first(); // amnil data kembali yang terbaru
                return ApiResponse::success($data_posko);
            } else {
                DB::rollBack();
                return ApiResponse::badRequest('Data posko tidak dapat disimpan.');
            }
        } catch (Exception $e) {
            return ApiResponse::badRequest($e);
        }
    }

    public function kebutuhan(string $id)
    {
        $posko = Posko::query()->find($id);

        return ApiResponse::success($posko->kebutuhan);
    }
}
