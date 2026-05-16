<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder; // Tambahkan ini di atas

class Pesanan extends Model
{
    protected $fillable = [
        'nama_pelanggan',
        'alamat',
        'no_hp',
        'nama_produk',
        'kategori',
        'jumlah',
        'harga_satuan',
        'total_harga',
        'status',
        'tanggal_pesan',
    ];

    // WAJIB ADA: Local Scope untuk Pesanan Menunggu
    // Nama fungsi di Model harus pakai awalan 'scope' (huruf kecil)
    // tapi saat dipanggil di Controller cukup 'menunggu()' saja.
    public function scopeMenunggu(Builder $query): Builder
    {
        return $query->where('status', 'menunggu');
    }

    // Tambahkan juga untuk Selesai agar tidak error nanti
    public function scopeSelesai(Builder $query): Builder
    {
        return $query->where('status', 'selesai');
    }
}
