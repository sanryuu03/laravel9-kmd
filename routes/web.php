<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendGeraiController;
use App\Http\Controllers\BackendHeaderController;
use App\Http\Controllers\BackendKomunitasMitraDesaController;
use App\Http\Controllers\BackendVerifikasiPembayaranGeraiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/backendKMD', [BackendKomunitasMitraDesaController::class, 'index'])->name('backend.kmd');
    Route::get('/backendKMDLogout', [BackendKomunitasMitraDesaController::class, 'logout'])->name('backend.logout');

    Route::get('/backendGerai', [BackendGeraiController::class, 'index'])->name('backend.gerai');
    Route::get('/backendAddGerai', [BackendGeraiController::class, 'tambahGerai'])->name('backend.tambah.gerai');
    Route::post('/backendSaveGerai', [BackendGeraiController::class, 'saveformgerai'])->name('save.form.gerai');
    Route::get('/backendProfileGerai/{id}', [BackendGeraiController::class, 'profilegerai'])->name('backend.profile.gerai');
    Route::post('/backendDeleteGerai/{id}', [BackendGeraiController::class, 'destroy'])->name('backend.delete.gerai');
    Route::post('/backendDeleteGerai/{id}', [BackendGeraiController::class, 'destroy'])->name('backend.destroy.gerai');

    Route::get('/backendVerifikasiPembayaranGerai/{id}', [BackendVerifikasiPembayaranGeraiController::class, 'index'])->name('backend.verifikasi.pembayaran.gerai');
    Route::post('/backendVerifikasiPembayaranGerai/{id}', [BackendVerifikasiPembayaranGeraiController::class, 'saveformverifikasigerai'])->name('backend.verifikasi.pembayaran.gerai.store');
    Route::get('/backendShowVerifikasiPembayaranGerai/{id}', [BackendVerifikasiPembayaranGeraiController::class, 'show'])->name('backend.show.verifikasi.pembayaran.gerai');

    Route::get('/backendGerai/pendaftarGeraiBaru', [BackendGeraiController::class, 'pendaftarGeraiBaru'])->name('backend.pendaftar.gerai.baru');
    Route::get('/backendVerifikasiPembayaranGerai/pendaftarGeraiBaru/{id}', [BackendVerifikasiPembayaranGeraiController::class, 'verifikasiPendaftarGeraiBaruOlehSuperAdmin'])->name('backend.verifikasi.pembayaran.gerai.baru');
    Route::match(['get','post'],'/approve/pendaftarGeraiBaru/{id}', [BackendVerifikasiPembayaranGeraiController::class, 'approvePendaftarGeraiBaruOlehSuperAdmin'])->name('approve.pembayaran.gerai.baru');

    Route::get('/backendGerai/geraiDalamProses', [BackendGeraiController::class, 'geraiDalamProses'])->name('backend.gerai.dalam.proses');

    Route::get('/backendGerai/geraiDitolak', [BackendGeraiController::class, 'geraiDitolak'])->name('backend.gerai.ditolak');

    Route::get('/backendGerai/geraiDiterima', [BackendGeraiController::class, 'geraiDiterima'])->name('backend.gerai.diterima');

    Route::get('/backendKMDAdmin', [BackendKomunitasMitraDesaController::class, 'backendKMDAdmin'])->name('backend.kmd.admin');
    Route::get('/backendKMDAdmin/adminKMD', [BackendKomunitasMitraDesaController::class, 'backendKMDAdminList'])->name('backend.kmd.admin.list');

});
Route::middleware(
    [
        'auth:sanctum', config('jetstream.auth_session'), 'verified', 'permission:header'
    ])->group(function () {
        Route::resource('/backendHeader', BackendHeaderController::class);
});
