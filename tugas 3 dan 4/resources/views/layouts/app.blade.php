<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioAqua Lab - @yield('title', 'Air Minum Isi Ulang')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>

    @include('partials.navbar')

    @if(session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            ❌ {{ session('error') }}
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')

</body>
</html>
