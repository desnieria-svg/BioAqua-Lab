<!DOCTYPE html>
<html>
<head>
    <title>BioAqua Lab</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

@include('components.navbar')

<main>
    @yield('content')
</main>

@include('components.footer')

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
