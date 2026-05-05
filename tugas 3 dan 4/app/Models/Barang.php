<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [/* ... kolom yang sudah ada ... */];

    // MASUKKAN DI SINI
    public function pesanans()
    {
        return $this->belongsToMany(Pesanan::class, 'barang_pesanan')
                    ->withPivot('jumlah')
                    ->withTimestamps();
    }
}
