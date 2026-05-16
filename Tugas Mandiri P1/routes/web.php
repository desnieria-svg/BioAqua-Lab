<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PreferensiController;

Route::get('/', [HomeController::class, 'index']);
Route::view('/tentang', 'tentang');
Route::view('/kontak', 'pages.kontak');
Route::get('/hitung/{a}/{b}', fn($a, $b) => $a + $b);

Route::post('/pesanan', [PesananController::class, 'store']);

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/barang/search', [BarangController::class, 'search'])->name('barang.search');
    Route::get('/cari-produk', fn() => view('barang.search'))->name('barang.cari');

    Route::get('/preferensi', [PreferensiController::class, 'index'])->name('preferensi');
    Route::post('/preferensi/simpan', [PreferensiController::class, 'simpan'])->name('preferensi.simpan');

    Route::get('/reset-kunjungan', function () {
        session()->forget(['kunjungan', 'pertama_kunjungan', 'terakhir_kunjungan']);
        return redirect('/')->with('success', 'Hitungan kunjungan berhasil direset!');
    })->name('reset.kunjungan');

});

Route::middleware(['auth', 'cek.admin'])->group(function () {
    Route::resource('barang', BarangController::class);
});