<?php
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index']);
Route::post('/pesanan', [PesananController::class, 'store']);
Route::view('/tentang', 'tentang');
Route::get('/hitung/{a}/{b}', fn($a, $b) => $a + $b);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
