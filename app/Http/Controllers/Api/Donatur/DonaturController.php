<?php

namespace App\Http\Controllers\Api\Donatur;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Models\Donatur\Donatur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Mengambil data donatur dengan paginasi
            $donatur = Donatur::with(['bantuan'])->orderBy('NamaPerusahaan', 'ASC')->get(); // Membatasi hasil menjadi 10 per halaman

            // Mengembalikan respons sukses dengan data donatur yang dipaginasi
            return ApiResponse::success($donatur);
        } catch (\Throwable $th) {
            // Menangkap dan menampilkan pesan error jika terjadi kesalahan
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
                'NamaPerusahaan' => 'nullable|string|max:50', // 'nama_perusahaan' bersifat opsional, tipe string, maksimal 50 karakter
                'Alamat' => 'required|string|max:255', // 'alamat' wajib, tipe string, maksimal 255 karakter
                'NamaKontak' => 'required|string',
                'NomorKontak' => 'required|string|max:16', // 'nomor_kontak' wajib, tipe string, maksimal 16 karakter
            ]);

            // Jika validasi gagal, kembalikan respons error
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400); // Mengembalikan error validasi dengan kode 422
            }

            // Membuat entri baru pada tabel 'Donatur' menggunakan data dari request
            $donatur = Donatur::lockForUpdate()->create([
                'NamaPerusahaan' => $request->NamaPerusahaan, // Menyimpan 'nama_perusahaan' dari request
                'Alamat' => $request->Alamat, // Menyimpan 'alamat' dari request
                'NamaKontak' => $request->NamaKontak,
                'NomorKontak' => $request->NomorKontak, // Menyimpan 'nomor_kontak' dari request
                'LastUpdateDate' => now(), // Menyimpan tanggal update terakhir
                'LastUpdateBy' => Auth::user()->IDPengguna, // Menyimpan ID user yang melakukan update
            ]);

            // Jika data donatur berhasil disimpan
            if ($donatur) {
                // Komit transaksi
                DB::commit();
                return ApiResponse::created($donatur); // Mengembalikan respons sukses dengan data donatur yang dibuat
            }

            // Jika gagal, rollback transaksi
            DB::rollback();
            return ApiResponse::badRequest(); // Mengembalikan respons error
        } catch (\Throwable $th) {
            // Rollback transaksi jika terjadi exception
            DB::rollback();
            return ApiResponse::badRequest($th->getMessage()); // Mengembalikan error dengan pesan exception
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // Mencari data donatur berdasarkan IDDonatur
            $donatur = Donatur::where('IDDonatur', $id)->first();

            // Jika data donatur ditemukan
            if (!is_null($donatur)) {
                return ApiResponse::success($donatur); // Mengembalikan respons sukses dengan data donatur
            }

            // Jika data donatur tidak ditemukan
            return ApiResponse::notFound(); // Mengembalikan respons not found
        } catch (\Throwable $th) {
            // Menangkap exception dan mengembalikan pesan error
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
                'NamaPerusahaan' => 'nullable|string|max:50', // nama_perusahaan bersifat opsional, maksimal 50 karakter
                'Alamat' => 'required|string|max:255', // alamat wajib, maksimal 255 karakter
                'NamaKontak' => 'required|string',
                'NomorKontak' => 'required|string|max:16', // nomor_kontak wajib, maksimal 16 karakter
            ]);

            // Jika validasi gagal, kembalikan respons error
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400); // Mengembalikan error validasi dengan kode 422
            }

            // Mengupdate data donatur di tabel berdasarkan ID yang diberikan
            $donatur = Donatur::lockForUpdate()->where('IDDonatur', $id)->update([
                'NamaPerusahaan' => $request->NamaPerusahaan, // Mengupdate nama perusahaan
                'Alamat' => $request->Alamat, // Mengupdate alamat
                'NamaKontak' => $request->NamaKontak,
                'NomorKontak' => $request->NomorKontak, // Mengupdate nomor kontak
                'LastUpdateDate' => now(), // Mengupdate waktu terakhir diperbarui
                'LastUpdateBy' => Auth::user()->IDPengguna, // Mengupdate user yang memperbarui data
            ]);

            // Jika proses update berhasil
            if ($donatur) {
                DB::commit(); // Menyimpan perubahan ke database
                // Mengembalikan respons sukses dengan data donatur terbaru
                return ApiResponse::success(Donatur::where('IDDonatur', $id)->first());
            }

            // Jika update gagal, rollback transaksi
            DB::rollback();
            return ApiResponse::badRequest(); // Mengembalikan respons bad request
        } catch (\Throwable $th) {
            // Rollback transaksi jika terjadi exception
            DB::rollback();
            return ApiResponse::badRequest($th->getMessage()); // Mengembalikan error dengan pesan exception
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
