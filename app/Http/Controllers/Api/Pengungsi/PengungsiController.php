<?php

namespace App\Http\Controllers\Api\Pengungsi;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Models\Pengungsi\Pengungsi;
use App\Models\Posko\Posko;
use Carbon\Carbon;
use Exception;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PengungsiController extends Controller
{
    public function index()
    {
        $pengungsi =  Pengungsi::with(['penduduk', 'posko.user']);
        if (request()->get('idPosko')) {
            $pengungsi = $pengungsi->where('IDPosko', '=', request()->get('idPosko'));
        }

        if (request()->get('idKelompok')) {
            $pengungsi = $pengungsi->whereHas('penduduk', function ($q) {
                $q->where('IDKelompok', request()->get('idKelompok'));
            });
        }

        $pengungsi = $pengungsi->get();

        return ApiResponse::success($pengungsi);
    }

    public function show($id)
    {
        // menampilkan detail pengungsi, degan relasi pendusuk, posko dan user
        $pengungsi = Pengungsi::with(['penduduk', 'posko.user'])->where('IDPengungsi', $id)->first();
        if (!$pengungsi) {
            return ApiResponse::badRequest('Data pengungsi tidak ditemukan.');
        }

        return ApiResponse::success($pengungsi);
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [ // validasi parameter
                'IDPosko' => 'required',
                'IDPenduduk' => 'required',
                'KondisiKhusus' => 'string|max:255',
            ]);

            if ($validator->fails()) { // jika parameter ada yang tidak sesuai dengan aturan, maka masuk kondisi error
                return ApiResponse::badRequest($validator->errors());
            }

            DB::beginTransaction(); // memulai transaksi
            $pengungsi = Pengungsi::lockForUpdate()->create([ // membuat record baru 
                'IDPenduduk' => $request->IDPenduduk, // ini adalah id user
                'IDPosko' => $request->IDPosko,
                'KondisiKhusus' => $request->KondisiKhusus,
                'LastUpdateDate' => Carbon::now(),
                'LastUpdateBy' => $request->user()->IDPengguna,
            ]);
            if ($pengungsi) {
                DB::commit();
                return ApiResponse::created($pengungsi);
            } else {
                DB::rollBack();
                return ApiResponse::badRequest('Data pengungsi tidak dapat disimpan.');
            }
        } catch (Exception $e) {
            return ApiResponse::badRequest($e);
        }
    }

    public function update(Request $request, $id)
    {
        try {

            if (!$id) { // cek apakah parameter id ada
                return ApiResponse::badRequest('error id missing');
            }
            $validator = Validator::make($request->all(), [ // cek validasi
                'IDPosko' => 'required|string',
                'IDPenduduk' => 'required|string',
                'KondisiKhusus' => 'string|max:255',
            ]);


            if ($validator->fails()) { // jika ada validasi yang tidak sesuai maka return error
                return ApiResponse::badRequest($validator->errors());
            }


            DB::beginTransaction(); // memulai transaksi
            $pengungsi = Pengungsi::where('IDPengungsi', $id)->lockForUpdate()->update([ // update record berdasarkan id pengungsi
                'IDPenduduk' => $request->IDPenduduk,
                'IDPosko' => $request->IDPosko,
                'KondisiKhusus' => $request->KondisiKhusus,
                'LastUpdateDate' => Carbon::now(),
                'LastUpdateBy' => $request->user()->IDPengguna,
            ]);
            if ($pengungsi) {
                DB::commit();
                return ApiResponse::success($pengungsi);
            } else {
                DB::rollBack();
                return ApiResponse::badRequest('pengungsi tidak ditemukan');
            }
        } catch (Exception $e) {
            return ApiResponse::badRequest($e);
        }
    }
}
