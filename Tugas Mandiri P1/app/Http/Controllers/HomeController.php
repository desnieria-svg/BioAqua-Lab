<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class HomeController extends Controller
{
    public function index()
    {
        $barang = Barang::all();

        $kunjungan = session()->get('kunjungan', 0) + 1;

        if (!session()->has('pertama_kunjungan')) {
            session()->put('pertama_kunjungan', now()->format('d/m/Y H:i:s'));
        }

        session()->put('terakhir_kunjungan', now()->format('d/m/Y H:i:s'));
        session()->put('kunjungan', $kunjungan);

        return view('pages.home', compact('barang', 'kunjungan'));
    }
}