<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class PesananController extends Controller
{
    public function store(Request $request)
    {
        Barang::create([
            'kode' => $request->kodeBarang,
            'nama' => $request->namaBarang,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'supplier' => $request->supplier,
            'tanggal' => $request->tanggalMasuk,
        ]);

        return redirect('/');
    }
}
