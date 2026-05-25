<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InspeksiController;
use App\Http\Controllers\ExportController; // ✔ tambah ini

/*
|--------------------------------------------------------------------------
| LOGIN PETUGAS
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'index']);

Route::post('/login-petugas', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| HALAMAN FORM INSPEKSI
|--------------------------------------------------------------------------
*/

// halaman utama setelah login
Route::get('/', function () {

    if (!session()->has('nama')) {
        return redirect('/login');
    }

    return view('form');
});

// halaman alternatif form inspeksi
Route::get('/inspeksi', function () {

    if (!session()->has('nama')) {
        return redirect('/login');
    }

    return view('form');
});

/*
|--------------------------------------------------------------------------
| SIMPAN DATA INSPEKSI
|--------------------------------------------------------------------------
*/

Route::post('/simpan-inspeksi', [InspeksiController::class, 'store']);

/*
|--------------------------------------------------------------------------
| EXPORT EXCEL
|--------------------------------------------------------------------------
*/

// ✔ EXPORT DATA INSPEKSI KE EXCEL
Route::get('/export-inspeksi', [ExportController::class, 'export']);