@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="dashboard-wrapper">

    {{-- Header Dashboard --}}
    <div class="dashboard-header">
        <h1>📊 Dashboard BioAqua Lab</h1>
        <p>Selamat datang, <strong>{{ auth()->user()->name }}</strong>! Berikut ringkasan data hari ini.</p>
    </div>

    {{-- STAT CARDS --}}
    <div class="stat-grid">
        @forelse ($stats as $stat)
            <x-stat-card
                :judul="$stat['judul']"
                :nilai="$stat['nilai']"
                :ikon="$stat['ikon']"
                :warna="$stat['warna']"
            />
        @empty
            <p>Tidak ada data statistik.</p>
        @endforelse
    </div>

    {{-- TABEL PESANAN --}}
    <div class="dashboard-table">
        <h2>📋 Daftar Pesanan Terbaru</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Pelanggan</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangTerbaru as $pesanan)
                    <tr>
                        <td style="font-weight: 600;">{{ $pesanan->nama_pelanggan }}</td>
                        <td>{{ $pesanan->nama_produk }}</td>
                        <td>{{ $pesanan->jumlah }}</td>
                        <td style="font-weight: bold; color: #2563eb;">
                            Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                        </td>
                        <td>
                            <span class="status {{ $pesanan->status }}">
                                {{ strtoupper($pesanan->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">Belum ada data pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection

@push('scripts')
    <script>
        console.log('Dashboard BioAqua Lab loaded!');
    </script>
@endpush