<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class HomeController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('pages.home', compact('barang'));
    }
}
