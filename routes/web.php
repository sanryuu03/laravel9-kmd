<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendKomunitasMitraDesaController;

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


    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});
