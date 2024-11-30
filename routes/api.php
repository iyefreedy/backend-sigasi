<?php

use App\Http\Controllers\Api\Posko\PoskoController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\Donatur\DonaturController;
use App\Http\Controllers\Api\Kebutuhan\KebutuhanController;
use App\Http\Controllers\Api\Kecamatan\BarangController;
use App\Http\Controllers\Api\Kecamatan\JenisBarangController;
use App\Http\Controllers\Api\Kelompok\KelompokController;
use App\Http\Controllers\Api\Penduduk\PendudukController;
use App\Http\Controllers\Api\Pengungsi\PengungsiController;
use App\Http\Controllers\Api\Bantuan\BantuanController;
use App\Http\Controllers\Api\UserManagement\UserManagementController;
use App\Http\Controllers\DistribusiController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KeluargaAnggotaController;
use App\Http\Controllers\KeluargaController;
use App\Http\Helpers\ApiResponse;
use App\Models\Penduduk\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return response()->json(['success' => true, 'message' => 'Welcome to Service'], 200);
});

Route::post('authenticate', [\App\Http\Controllers\Api\AuthController::class, 'authenticate']);
Route::post('logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
Route::post('refresh', [\App\Http\Controllers\Api\AuthController::class, 'refresh']);

Route::resource('kecamatan', KecamatanController::class);
Route::get('/kecamatan/{id}/desa', [KecamatanController::class, 'desa']);

Route::middleware('auth:api')->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });

    Route::get('/penduduk-tanpa-pengungsi', function (Request $request) {
        $penduduk = Penduduk::query()
            ->where('IDDesa', $request->input('idDesa'))
            ->whereDoesntHave('pengungsi')
            ->get();

        return ApiResponse::success($penduduk);
    });

    Route::controller(UserManagementController::class)
        ->prefix('user-management')
        ->group(function () {
            Route::get('/', 'index');
            Route::get('/{id}', 'show');
            Route::post('', 'store');
            Route::put('/{id}', 'update');
        });

    Route::controller(PoskoController::class)
        ->prefix('posko')
        ->group(function () {
            Route::get('/', 'index');
            Route::get('/{id}', 'show');
            Route::post('/', 'store');
            Route::put('/{id}', 'update');
            Route::get('/{id}/kebutuhan', 'kebutuhan');
        });

    Route::controller(PengungsiController::class)
        ->prefix('pengungsi')
        ->group(function () {
            Route::get('', 'index');
            Route::get('/{id}', 'show');
            Route::post('', 'store');
            Route::put('/{id}', 'update');
        });

    Route::controller(KebutuhanController::class)
        ->prefix('kebutuhan')
        ->group(function () {
            Route::get('/', 'index');
            Route::get('/{id}', 'show');
            Route::post('/', 'store');
            Route::put('/{id}', 'qtyReceived');
            Route::put('/{id}', 'update');
        });

    Route::controller(BarangController::class)
        ->prefix('barang')
        ->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store');
            Route::get('/{id}', 'show');
            Route::put('/{id}', 'update');
        });

    Route::controller(JenisBarangController::class)
        ->prefix('jenis-barang')
        ->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store');
            Route::get('/{id}', 'show');
            Route::put('/{id}', 'update');
        });

    Route::controller(KelompokController::class)
        ->prefix('kelompok')
        ->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store');
            Route::get('/{id}', 'show');
            Route::put('/{id}', 'update');
        });

    Route::controller(PendudukController::class)
        ->prefix('penduduk')
        ->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store');
            Route::get('/{id}', 'show');
            Route::put('/{id}', 'update');
        });

    Route::controller(DonaturController::class)
        ->prefix('donatur')
        ->group(function () {
            Route::get('/', 'index');
            Route::post('', 'store');
            Route::get('/{id}', 'show');
            Route::put('/{id}', 'update');
        });

    Route::controller(BantuanController::class)
        ->prefix('bantuan')
        ->group(function () {
            Route::get('/', 'index');
            Route::get('/createOrEdit', 'createOrEdit');
            Route::post('/', 'store');
            Route::get('/{id}', 'show');
            Route::put('/{id}', 'update');
        });

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('distribusi', DistribusiController::class);
    Route::resource('keluarga', KeluargaController::class);
    Route::resource('keluarga.anggota', KeluargaAnggotaController::class);
});
