@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Produk Air Minum</h2>
        <a href="{{ route('barang.create') }}" class="btn btn-primary">+ Tambah Produk</a>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Kode</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barangs as $index => $barang)
                <tr>
                    <td>{{ $barangs->firstItem() + $index }}</td>
                    <td>
                        @if($barang->foto)
                            <img src="{{ asset('storage/' . $barang->foto) }}" width="50" height="50" style="object-fit:cover; border-radius:5px;">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $barang->kode }}</td>
                    <td>{{ $barang->nama }}</td>
                    <td><span class="badge bg-info text-dark">{{ ucfirst($barang->kategori) }}</span></td>
                    <td>{{ $barang->jumlah }} {{ $barang->satuan }}</td>
                    <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                    <td>{{ $barang->supplier }}</td>
                    <td>
                        <a href="{{ route('barang.show', $barang) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('barang.edit', $barang) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('barang.destroy', $barang) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin ingin menghapus produk {{ $barang->nama }}?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center text-muted">Belum ada produk tersedia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $barangs->links() }}
    </div>
</div>
@endsection