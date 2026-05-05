<nav class="navbar">
    <div class="navbar-container">
        <!-- Logo di sebelah kiri -->
        <div class="navbar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="BioAqua Lab" height="40">
            <span>BioAqua Lab</span>
        </div>

        <!-- Menu di sebelah kanan pojok -->
        <ul class="navbar-menu">
            <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>
            <li><a href="{{ url('/tentang') }}" class="{{ request()->is('tentang') ? 'active' : '' }}">Tentang</a></li>
            <li><a href="{{ url('/kontak') }}" class="{{ request()->is('kontak') ? 'active' : '' }}">Kontak</a></li>
            <li><a href="{{ url('/dashboard') }}" class="btn-dashboard {{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a></li>
        </ul>
    </div>
</nav>

<style>
.navbar {
    background: #fff;
    padding: 15px 0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    width: 100%;
    top: 0;
    z-index: 1000;
}

.navbar-container {
    /* Menggunakan lebar 95% agar logo dan menu benar-benar di pojok */
    width: 95%;
    max-width: 100%; /* Menghilangkan batasan lebar sempit */
    margin: 0 auto;
    display: flex;
    justify-content: space-between; /* KUNCI: Logo kiri, Menu kanan */
    align-items: center;
}

.navbar-brand {
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: bold;
    color: #0369a1;
    font-size: 1.2rem;
}

.navbar-menu {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    gap: 30px; /* Jarak antar menu lebih lebar sedikit */
    align-items: center;
}

.navbar-menu a {
    text-decoration: none;
    color: #334155;
    font-weight: 500;
    transition: 0.3s;
}

/* Tombol Dashboard Biru */
.btn-dashboard {
    background: #3b82f6;
    color: #fff !important;
    padding: 10px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(59, 130, 246, 0.2);
}

.btn-dashboard:hover {
    background: #2563eb;
    transform: translateY(-2px);
}
</style>
