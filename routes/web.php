<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendGeraiController;
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

// Route::middleware(['role:super admin', 'permission:kepengurusan perusahaan|gerai|panitia|pengelola gerai|bisnis developer|susunan panitian|admin|keuangan|pembayaran|slider|kategori unggulan|berita|akun'])->group(function () {
//     Route::get('/backendKMD', [BackendKomunitasMitraDesaController::class, 'index'])->name('backend.kmd');
//     Route::get('/backendKMDLogout', [BackendKomunitasMitraDesaController::class, 'logout'])->name('backend.logout');
// });
// Route::middleware(['role:super admin'])->group(function () {
//     Route::get('/backendKMD', [BackendKomunitasMitraDesaController::class, 'index'])->name('backend.kmd');
//     Route::get('/backendKMDLogout', [BackendKomunitasMitraDesaController::class, 'logout'])->name('backend.logout');

//     Route::get('/backendGerai', [BackendGeraiController::class, 'index'])->name('backend.gerai');
//     Route::get('/backendAddGerai', [BackendGeraiController::class, 'tambahGerai'])->name('backend.tambah.gerai');
//     Route::post('/backendSaveGerai', [BackendGeraiController::class, 'saveformgerai'])->name('save.form.gerai');
//     Route::get('/backendProfileGerai/{id}', [BackendGeraiController::class, 'profilegerai'])->name('backend.profile.gerai');
//     Route::post('/backendDeleteGerai/{id}', [BackendGeraiController::class, 'destroy'])->name('backend.delete.gerai');

//     Route::get('/backendVerifikasiPembayaranGerai', [BackendVerifikasiPembayaranGeraiController::class, 'index'])->name('backend.verifikasi.pembayaran.gerai');
// });
// Route::middleware(['role:admin'])->group(function () {
//     Route::get('/backendKMD', [BackendKomunitasMitraDesaController::class, 'index'])->name('backend.kmd');
//     Route::get('/backendKMDLogout', [BackendKomunitasMitraDesaController::class, 'logout'])->name('backend.logout');

//     Route::get('/backendGerai', [BackendGeraiController::class, 'index'])->name('backend.gerai');
//     Route::get('/backendAddGerai', [BackendGeraiController::class, 'tambahGerai'])->name('backend.tambah.gerai');
//     Route::post('/backendSaveGerai', [BackendGeraiController::class, 'saveformgerai'])->name('save.form.gerai');
//     Route::get('/backendProfileGerai/{id}', [BackendGeraiController::class, 'profilegerai'])->name('backend.profile.gerai');
//     Route::post('/backendDeleteGerai/{id}', [BackendGeraiController::class, 'destroy'])->name('backend.delete.gerai');

//     Route::get('/backendVerifikasiPembayaranGerai', [BackendVerifikasiPembayaranGeraiController::class, 'index'])->name('backend.verifikasi.pembayaran.gerai');
// });
// Route::middleware(['role:anggota'])->group(function () {
//     Route::get('/backendKMD', [BackendKomunitasMitraDesaController::class, 'index'])->name('backend.kmd');
//     Route::get('/backendKMDLogout', [BackendKomunitasMitraDesaController::class, 'logout'])->name('backend.logout');

//     Route::get('/backendGerai', [BackendGeraiController::class, 'index'])->name('backend.gerai');
//     Route::get('/backendAddGerai', [BackendGeraiController::class, 'tambahGerai'])->name('backend.tambah.gerai');
//     Route::post('/backendSaveGerai', [BackendGeraiController::class, 'saveformgerai'])->name('save.form.gerai');
//     Route::get('/backendProfileGerai/{id}', [BackendGeraiController::class, 'profilegerai'])->name('backend.profile.gerai');
//     Route::post('/backendDeleteGerai/{id}', [BackendGeraiController::class, 'destroy'])->name('backend.delete.gerai');

//     Route::get('/backendVerifikasiPembayaranGerai', [BackendVerifikasiPembayaranGeraiController::class, 'index'])->name('backend.verifikasi.pembayaran.gerai');
// });

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


});
