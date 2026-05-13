@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')

<div class="dashboard-wrapper">

    <div class="tentang-card">

        <h1>📞 Kontak BioAqua Lab</h1>

        <p>Ada pertanyaan atau ingin memesan? Hubungi kami melalui:</p>

        <ul>
            <li>📍 Jl. Tirta Murni No. 24, Bandung, Jawa Barat</li>
            <li>📞 +62 22 123-456</li>
            <li>📱 +62 812-3456-7890 (WhatsApp)</li>
            <li>✉️ info@bioaqua.lab</li>
            <li>🕐 Senin–Sabtu: 07.00 – 18.00 WIB</li>
        </ul>

        <a href="{{ url('/') }}" class="btn btn-primary">← Kembali ke Home</a>

    </div>

</div>

@endsection

@push('scripts')
    <script>
        console.log('Halaman Kontak loaded!');
    </script>
@endpush
