<?php

namespace App\Http\Controllers;

use App\Models\Pesanan; // Pastikan ini P kapital sesuai nama file tadi
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            [
                'judul' => 'Total Produk',
                'nilai' => 7,
                'ikon'  => '📦',
                'warna' => 'blue'
            ],
            [
                'judul' => 'Pesanan Menunggu',
                'nilai' => Pesanan::menunggu()->count(),
                'ikon'  => '⏳',
                'warna' => 'orange'
            ],
            [
                'judul' => 'Pelanggan Aktif',
                'nilai' => Pesanan::distinct('nama_pelanggan')->count(),
                'ikon'  => '👥',
                'warna' => 'purple'
            ],
            [
                'judul' => 'Total Pendapatan',
                'nilai' => 'Rp ' . number_format(Pesanan::sum('total_harga'), 0, ',', '.'),
                'ikon'  => '💰',
                'warna' => 'green'
            ],
        ];

        $barangTerbaru = Pesanan::latest()->get();

        return view('dashboard', compact('stats', 'barangTerbaru'));
    }
}
