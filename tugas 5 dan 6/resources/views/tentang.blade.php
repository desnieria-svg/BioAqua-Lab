@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')

<div class="dashboard-wrapper">

    <div class="tentang-card">

        <h1>💧 Tentang BioAqua Lab</h1>

        <p>
            BioAqua Lab adalah penyedia air minum berkualitas tinggi yang berfokus pada
            kesehatan, kebersihan, dan kepercayaan pelanggan. Kami memastikan setiap tetes
            air yang Anda konsumsi benar-benar murni dan aman.
        </p>

        <h2>🌟 Visi</h2>
        <p>Menjadi penyedia air minum paling terpercaya dan modern di Indonesia.</p>

        <h2>🎯 Misi</h2>
        <ul>
            <li>✔ Menyediakan air minum higienis dan berkualitas tinggi</li>
            <li>✔ Memberikan pelayanan cepat dan profesional</li>
            <li>✔ Menggunakan teknologi penyaringan modern</li>
        </ul>

        <h2>🚀 Kenapa Pilih Kami?</h2>
        <p>
            BioAqua Lab sudah dipercaya ribuan pelanggan dengan sistem modern,
            kualitas terjamin, dan pelayanan cepat sampai ke rumah Anda.
        </p>

        <a href="{{ url('/') }}" class="btn btn-primary">← Kembali ke Home</a>

    </div>

</div>

@endsection

@push('scripts')
    <script>
        console.log('Halaman Tentang loaded!');
    </script>
@endpush
