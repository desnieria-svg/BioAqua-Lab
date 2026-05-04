<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'kode',
        'nama',
        'kategori',
        'jumlah',
        'satuan',
        'harga',
        'supplier',
        'tanggal',
        'foto',
    ];

    public function pesanans()
    {
        return $this->belongsToMany(Pesanan::class, 'barang_pesanan')
                    ->withPivot('jumlah')
                    ->withTimestamps();
    }
}