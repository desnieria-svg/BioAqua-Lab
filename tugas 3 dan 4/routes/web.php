<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AuthController;

// Public routes
Route::get('/', [HomeController::class, 'index']);
Route::view('/tentang', 'tentang');
Route::view('/kontak', 'pages.kontak');
Route::get('/hitung/{a}/{b}', fn($a, $b) => $a + $b);

// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Pesanan (public - untuk form order dari pelanggan)
Route::post('/pesanan', [PesananController::class, 'store']);

// CRUD Barang (protected - hanya admin/login)
Route::resource('barang', BarangController::class);