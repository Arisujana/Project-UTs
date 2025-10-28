<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');  // Tambahkan ini

Route::resource('pembeli', PembeliController::class);
Route::resource('menu', MenuController::class);
Route::resource('transaksi', TransaksiController::class);
