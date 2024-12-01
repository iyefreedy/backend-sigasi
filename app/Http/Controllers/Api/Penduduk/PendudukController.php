<?php

namespace App\Http\Controllers\Api\Penduduk;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Models\Keluarga;
use App\Models\Penduduk\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            // Mengambil daftar Penduduk dengan relasi kelompok, dan melakukan pagination
            $keluarga = Keluarga::query();

            if (isset($request->idDesa)) {
                $keluarga = $keluarga->where('IDDesa', $request->get('idDesa'));
            }

            if (isset($request->idKelompok)) {
                $keluarga = $keluarga->with(['anggota.penduduk'])->where('IDKelompok', $request->get('idKelompok'));
            }

            $keluarga = $keluarga->with(['anggota' => function ($query) {
                $query->orderByRaw("FIELD(Hubungan, 'Kepala Keluarga', 'Istri', 'Anak', 'Orang Tua', 'Lainnya')");
            }])->orderBy('NomorKK')->get();

            $penduduk = $keluarga->flatMap(function ($item) {
                return $item->anggota->map(function ($anggota) {
                    return $anggota->penduduk;
                });
            })->filter();

            // Mengembalikan response sukses dengan data penduduk
            return ApiResponse::success($penduduk->values());
        } catch (\Throwable $th) {
            // Menangkap exception dan mengembalikan pesan error
            return ApiResponse::badRequest($th->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Memulai transaksi database
            DB::beginTransaction();

            // Validasi input dari request
            $validator = Validator::make($request->all(), [
                'KTP' => 'nullable|string|max:16',
                'Nama' => 'required|string|max:20',
                'Alamat' => 'required|string|max:50',
                'TanggalLahir' => 'required|date',
                'JenisKelamin' => 'required',
                'IDKecamatan' => 'required',
                'IDDesa' => 'required',
                'IDKelompok' => 'required',
            ]);

            // Jika validasi gagal, kembalikan error dengan status 422
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            // Membuat data Penduduk baru dengan lock untuk mencegah konflik
            $penduduk = Penduduk::create([
                'IDPenduduk' => $request->IDPenduduk,
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

            // Jika penyimpanan berhasil, commit transaksi dan kembalikan response sukses
            if ($penduduk) {
                DB::commit();
                return ApiResponse::created($penduduk);
            }

            // Rollback transaksi jika gagal
            DB::rollback();
            return ApiResponse::badRequest();
        } catch (\Throwable $th) {
            // Rollback transaksi jika terjadi exception
            DB::rollback();
            return ApiResponse::badRequest($th->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $penduduk = Penduduk::with([
                'kelompok'
            ])->where('IDPenduduk', $id)->first();

            // Jika penduduk ditemukan, kembalikan response sukses
            if (!is_null($penduduk)) {
                return ApiResponse::success($penduduk);
            }

            // Jika penduduk tidak ditemukan, kembalikan response not found
            return ApiResponse::notFound();
        } catch (\Throwable $th) {
            // Tangani exception dan kembalikan error
            return ApiResponse::badRequest($th->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Memulai transaksi database
            DB::beginTransaction();

            // Validasi input dari request
            $validator = Validator::make($request->all(), [
                'KTP' => 'nullable|string|max:16',
                'Nama' => 'required|string|max:50',
                'Alamat' => 'required|string|max:255',
                'TanggalLahir' => 'required|date',
                'JenisKelamin' => 'required',
                'IDKecamatan' => 'required',
                'IDDesa' => 'required',
                'IDKelompok' => 'required',
            ]);

            // Jika validasi gagal, kembalikan error dengan status 422
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            // Update data Penduduk berdasarkan IDPenduduk
            $penduduk = Penduduk::query()->find($id)->update([
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


            // Jika update berhasil, commit transaksi dan kembalikan response sukses
            if ($penduduk) {
                DB::commit();
                return ApiResponse::success(Penduduk::with([
                    'kelompok'
                ])->where('IDPenduduk', $id)->first());
            }

            // Rollback jika update gagal
            DB::rollback();
            return ApiResponse::badRequest();
        } catch (\Throwable $th) {
            // Rollback transaksi jika terjadi exception
            DB::rollback();
            return ApiResponse::badRequest($th->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
