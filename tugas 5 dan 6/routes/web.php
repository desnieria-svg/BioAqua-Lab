<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananController;

// Public routes
Route::get('/', [HomeController::class, 'index']);
Route::view('/tentang', 'tentang');
Route::view('/kontak', 'pages.kontak');
Route::get('/hitung/{a}/{b}', fn($a, $b) => $a + $b);

// Pesanan public
Route::post('/pesanan', [PesananController::class, 'store']);

// Auth routes dari Breeze
require __DIR__.'/auth.php';

// Protected - harus login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Protected - harus login + admin
Route::middleware(['auth', 'cek.admin'])->group(function () {
    Route::resource('barang', BarangController::class);
});