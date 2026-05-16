@extends('layouts.app')

@section('content')

  <!-- HERO SECTION -->
  <section class="hero" id="home">

    <div class="bubble b1"></div>
    <div class="bubble b2"></div>
    <div class="bubble b3"></div>
    <div class="bubble b4"></div>

    <div class="hero-content">
      <p class="hero-tagline">✦ Sistem Manajemen Air Minum</p>
      <h1 class="hero-title">
        Selamat Datang di<br />
        <span>BioAqua Lab</span>
      </h1>

      <p class="hero-desc">
        Air Minum Isi Ulang Kepercayaan Kita — Kelola stok, pemesanan, dan
        distribusi air mineral berkualitas dengan mudah dan efisien.
      </p>
      <div class="hero-actions">
        <a href="#pesanan" class="btn btn-white">Buat Pesanan</a>
        <a href="#produk"  class="btn btn-ghost">Lihat Produk</a>
      </div>
      <div class="hero-chips">
        <span class="chip">💧 100% Murni</span>
        <span class="chip">🏆 Bersertifikat</span>
        <span class="chip">🚚 Antar ke Rumah</span>
      </div>
    </div>

    <div class="hero-visual">
      <div class="water-bottle">
        <div class="bottle-body">
          <div class="water-fill"></div>
          <div class="bottle-label">
            <strong>BioAqua</strong>
            <small>Premium Water</small>
          </div>
        </div>
        <div class="bottle-cap"></div>
      </div>
    </div>
  </section>

  {{-- Section Cuaca Jember --}}
  <div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">🌤️ Cuaca Hari Ini — Kota Jember</h5>

            <div id="cuaca-loading" class="text-muted">
                <div class="spinner-border spinner-border-sm text-primary" role="status"></div>
                Sedang mengambil data cuaca...
            </div>

            <div id="cuaca-result" style="display:none;">
                <p class="mb-1">📍 Kota: <strong id="cuaca-kota"></strong></p>
                <p class="mb-1">🌡️ Suhu: <strong id="cuaca-suhu"></strong>°C</p>
                <p class="mb-0">☁️ Kondisi: <strong id="cuaca-deskripsi"></strong></p>
            </div>

            <div id="cuaca-error" class="text-danger" style="display:none;">
                ⚠️ Gagal mengambil data cuaca.
            </div>
        </div>
    </div>
  </div>

  <!-- STATISTIK SINGKAT -->
  <section class="stats-bar">
    <div class="container">
      <div class="stats-grid">
        <div class="stat-item" data-aos>
          <strong>2.500+</strong>
          <span>Pelanggan Aktif</span>
        </div>
        <div class="stat-item" data-aos>
          <strong>15 Ton</strong>
          <span>Air Diproses / Hari</span>
        </div>
        <div class="stat-item" data-aos>
          <strong>99.8%</strong>
          <span>Tingkat Kemurnian</span>
        </div>
        <div class="stat-item" data-aos>
          <strong>8 Tahun</strong>
          <span>Pengalaman</span>
        </div>
      </div>
    </div>
  </section>

  <section class="produk-section" id="produk">
    <div class="container">
      <div class="section-header" data-aos>
        <p class="section-label">Katalog</p>
        <h2 class="section-title">Produk Air Kami</h2>
        <p class="section-desc">Pilih produk air minum berkualitas sesuai kebutuhan Anda</p>
      </div>

      <div class="produk-layout">

        <!-- SIDEBAR FILTER -->
        <aside class="sidebar" id="sidebar">
          <div class="sidebar-header">
            <h3>🔍 Filter Produk</h3>
          </div>

          <div class="filter-group">
            <h4>Kategori</h4>
            <label class="checkbox-label">
              <input type="checkbox" value="galon" checked onchange="filterProduk()" />
              <span>Air Galon</span>
            </label>
            <label class="checkbox-label">
              <input type="checkbox" value="botol" checked onchange="filterProduk()" />
              <span>Air Botol</span>
            </label>
            <label class="checkbox-label">
              <input type="checkbox" value="jerigen" checked onchange="filterProduk()" />
              <span>Air Jerigen</span>
            </label>
            <label class="checkbox-label">
              <input type="checkbox" value="cup" checked onchange="filterProduk()" />
              <span>Air Cup</span>
            </label>
          </div>

          <div class="filter-group">
            <h4>Harga Maksimal</h4>
            <input type="range" id="hargaRange" min="5000" max="100000"
                   value="100000" step="5000" oninput="updateHargaFilter(this)" />
            <p class="range-label">Maks: <span id="hargaLabel">Rp 100.000</span></p>
          </div>

          <div class="filter-group">
            <h4>Ketersediaan</h4>
            <label class="checkbox-label">
              <input type="checkbox" value="tersedia" checked onchange="filterProduk()" />
              <span>Tersedia</span>
            </label>
            <label class="checkbox-label">
              <input type="checkbox" value="habis" onchange="filterProduk()" />
              <span>Habis</span>
            </label>
          </div>

          <button class="btn btn-primary btn-full" onclick="resetFilter()">
            Reset Filter
          </button>
        </aside>

        <!-- GRID KARTU PRODUK -->
        <main class="produk-grid" id="produkGrid">

          <article class="product-card" data-kategori="galon" data-harga="20000" data-status="tersedia" data-aos>
            <div class="card-badge">Terlaris</div>
            <div class="card-img galon">💧</div>
            <div class="card-body">
              <span class="card-cat">Air Galon</span>
              <h3>Galon Isi Ulang 19L</h3>
              <p>Air mineral murni proses reverse osmosis, bebas bakteri dan kuman.</p>
              <div class="card-footer">
                <strong class="card-price">Rp 20.000</strong>
                <button class="btn btn-primary btn-sm" onclick="tambahKeranjang(this, 'Galon Isi Ulang 19L')">
                  + Pesan
                </button>
              </div>
            </div>
          </article>

          <article class="product-card" data-kategori="botol" data-harga="8000" data-status="tersedia" data-aos>
            <div class="card-img botol">🍶</div>
            <div class="card-body">
              <span class="card-cat">Air Botol</span>
              <h3>Botol 1500ml Premium</h3>
              <p>Air mineral bersih dengan kandungan mineral alami seimbang.</p>
              <div class="card-footer">
                <strong class="card-price">Rp 8.000</strong>
                <button class="btn btn-primary btn-sm" onclick="tambahKeranjang(this, 'Botol 1500ml Premium')">
                  + Pesan
                </button>
              </div>
            </div>
          </article>

          <article class="product-card" data-kategori="jerigen" data-harga="45000" data-status="tersedia" data-aos>
            <div class="card-img jerigen">🪣</div>
            <div class="card-body">
              <span class="card-cat">Air Jerigen</span>
              <h3>Jerigen Air 10L</h3>
              <p>Kemasan jerigen food-grade untuk keperluan memasak dan minum.</p>
              <div class="card-footer">
                <strong class="card-price">Rp 45.000</strong>
                <button class="btn btn-primary btn-sm" onclick="tambahKeranjang(this, 'Jerigen Air 10L')">
                  + Pesan
                </button>
              </div>
            </div>
          </article>

          <article class="product-card" data-kategori="cup" data-harga="5000" data-status="tersedia" data-aos>
            <div class="card-img cup">🥤</div>
            <div class="card-body">
              <span class="card-cat">Air Cup</span>
              <h3>Cup Air 240ml (1 Dus)</h3>
              <p>Satu dus berisi 48 cup, cocok untuk acara dan kantor.</p>
              <div class="card-footer">
                <strong class="card-price">Rp 25.000</strong>
                <button class="btn btn-primary btn-sm" onclick="tambahKeranjang(this, 'Cup Air 240ml')">
                  + Pesan
                </button>
              </div>
            </div>
          </article>

          <article class="product-card" data-kategori="galon" data-harga="35000" data-status="tersedia" data-aos>
            <div class="card-img galon">💎</div>
            <div class="card-body">
              <span class="card-cat">Air Galon</span>
              <h3>Galon Premium Alkaline</h3>
              <p>Air alkali pH 8.5 untuk keseimbangan asam basa tubuh optimal.</p>
              <div class="card-footer">
                <strong class="card-price">Rp 35.000</strong>
                <button class="btn btn-primary btn-sm" onclick="tambahKeranjang(this, 'Galon Premium Alkaline')">
                  + Pesan
                </button>
              </div>
            </div>
          </article>

          <article class="product-card" data-kategori="botol" data-harga="12000" data-status="habis" data-aos>
            <div class="card-img botol" style="opacity:0.5;">🍾</div>
            <div class="card-badge habis">Habis</div>
            <div class="card-body">
              <span class="card-cat">Air Botol</span>
              <h3>Botol Kaca 750ml</h3>
              <p>Kemasan kaca premium, bebas BPA dan ramah lingkungan.</p>
              <div class="card-footer">
                <strong class="card-price">Rp 12.000</strong>
                <button class="btn btn-disabled btn-sm" disabled>Habis</button>
              </div>
            </div>
          </article>

          <article class="product-card" data-kategori="jerigen" data-harga="80000" data-status="tersedia" data-aos>
            <div class="card-img jerigen">💧</div>
            <div class="card-body">
              <span class="card-cat">Air Jerigen</span>
              <h3>Jerigen Ekstra 20L</h3>
              <p>Kapasitas besar untuk keluarga atau usaha skala kecil.</p>
              <div class="card-footer">
                <strong class="card-price">Rp 80.000</strong>
                <button class="btn btn-primary btn-sm" onclick="tambahKeranjang(this, 'Jerigen Ekstra 20L')">
                  + Pesan
                </button>
              </div>
            </div>
          </article>

          <article class="product-card" data-kategori="cup" data-harga="18000" data-status="tersedia" data-aos>
            <div class="card-badge">Baru</div>
            <div class="card-img cup">🫙</div>
            <div class="card-body">
              <span class="card-cat">Air Cup</span>
              <h3>Cup Mineral 330ml (24 pcs)</h3>
              <p>Ukuran lebih besar, ideal untuk perjalanan dan outdoor.</p>
              <div class="card-footer">
                <strong class="card-price">Rp 18.000</strong>
                <button class="btn btn-primary btn-sm" onclick="tambahKeranjang(this, 'Cup Mineral 330ml')">
                  + Pesan
                </button>
              </div>
            </div>
          </article>

        </main>
      </div>
    </div>
  </section>

  <section class="tabel-section" id="data-barang">
    <div class="container">
      <div class="section-header" data-aos>
        <p class="section-label">Inventaris</p>
        <h2 class="section-title">Data Stok Barang</h2>
        <p class="section-desc">Informasi ketersediaan produk di gudang BioAqua Lab</p>
      </div>

      <div class="table-wrapper" data-aos>
        <table class="data-table" id="dataTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Kategori</th>
              <th>Jumlah</th>
              <th>Satuan</th>
              <th>Harga</th>
              <th>Supplier</th>
              <th>Tgl Masuk</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td><span class="kode">BA-001</span></td>
              <td>Galon Isi Ulang 19L</td>
              <td><span class="badge-kat galon">Galon</span></td>
              <td>150</td>
              <td>Galon</td>
              <td>Rp 20.000</td>
              <td>PT Tirta Nusantara</td>
              <td>2025-01-10</td>
              <td><span class="status tersedia">Tersedia</span></td>
            </tr>
            <tr>
              <td>2</td>
              <td><span class="kode">BA-002</span></td>
              <td>Botol 1500ml Premium</td>
              <td><span class="badge-kat botol">Botol</span></td>
              <td>500</td>
              <td>Botol</td>
              <td>Rp 8.000</td>
              <td>CV Aqua Mandiri</td>
              <td>2025-01-12</td>
              <td><span class="status tersedia">Tersedia</span></td>
            </tr>
            <tr>
              <td>3</td>
              <td><span class="kode">BA-003</span></td>
              <td>Jerigen Air 10L</td>
              <td><span class="badge-kat jerigen">Jerigen</span></td>
              <td>80</td>
              <td>Jerigen</td>
              <td>Rp 45.000</td>
              <td>UD Sumber Sejati</td>
              <td>2025-01-15</td>
              <td><span class="status tersedia">Tersedia</span></td>
            </tr>
            <tr>
              <td>4</td>
              <td><span class="kode">BA-004</span></td>
              <td>Cup Air 240ml (1 Dus)</td>
              <td><span class="badge-kat cup">Cup</span></td>
              <td>200</td>
              <td>Dus</td>
              <td>Rp 25.000</td>
              <td>PT Aqua Bening</td>
              <td>2025-01-18</td>
              <td><span class="status tersedia">Tersedia</span></td>
            </tr>
            <tr>
              <td>5</td>
              <td><span class="kode">BA-005</span></td>
              <td>Botol Kaca 750ml</td>
              <td><span class="badge-kat botol">Botol</span></td>
              <td>0</td>
              <td>Botol</td>
              <td>Rp 12.000</td>
              <td>CV Aqua Mandiri</td>
              <td>2025-01-08</td>
              <td><span class="status habis">Habis</span></td>
            </tr>
            <tr>
              <td>6</td>
              <td><span class="kode">BA-006</span></td>
              <td>Galon Premium Alkaline</td>
              <td><span class="badge-kat galon">Galon</span></td>
              <td>60</td>
              <td>Galon</td>
              <td>Rp 35.000</td>
              <td>PT Tirta Nusantara</td>
              <td>2025-01-20</td>
              <td><span class="status tersedia">Tersedia</span></td>
            </tr>
            <tr>
              <td>7</td>
              <td><span class="kode">BA-007</span></td>
              <td>Jerigen Ekstra 20L</td>
              <td><span class="badge-kat jerigen">Jerigen</span></td>
              <td>40</td>
              <td>Jerigen</td>
              <td>Rp 80.000</td>
              <td>UD Sumber Sejati</td>
              <td>2025-01-22</td>
              <td><span class="status tersedia">Tersedia</span></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="table-summary" data-aos>
        <p>Total: <strong>7 item</strong> terdaftar &nbsp;|&nbsp; Stok tersedia: <strong>6 item</strong> &nbsp;|&nbsp; Habis: <strong>1 item</strong></p>
      </div>
    </div>
  </section>

  <section class="form-section" id="pesanan">
    <div class="container">
      <div class="section-header" data-aos>
        <p class="section-label">Input Data</p>
        <h2 class="section-title">Form Pemesanan Barang</h2>
        <p class="section-desc">Isi formulir di bawah untuk menambahkan atau memesan barang</p>
      </div>

      <div class="form-wrapper" data-aos>
        <form id="formPesanan" class="form-grid" novalidate>

          <div class="form-group">
            <label for="kodeBarang">Kode Barang <span class="required">*</span></label>
            <input type="text" id="kodeBarang" name="kodeBarang"
                   placeholder="Contoh: BA-008" required pattern="BA-[0-9]{3}" />
            <small class="hint">Format: BA-XXX (misal BA-008)</small>
          </div>

          <div class="form-group">
            <label for="namaBarang">Nama Barang <span class="required">*</span></label>
            <input type="text" id="namaBarang" name="namaBarang"
                   placeholder="Nama produk air minum" required />
          </div>

          <div class="form-group">
            <label for="kategori">Kategori <span class="required">*</span></label>
            <select id="kategori" name="kategori" required>
              <option value="">-- Pilih Kategori --</option>
              <option value="galon">Air Galon</option>
              <option value="botol">Air Botol</option>
              <option value="jerigen">Air Jerigen</option>
              <option value="cup">Air Cup</option>
              <option value="lainnya">Lainnya</option>
            </select>
          </div>

          <div class="form-group">
            <label for="jumlah">Jumlah <span class="required">*</span></label>
            <input type="number" id="jumlah" name="jumlah"
                   placeholder="0" min="1" required />
          </div>

          <div class="form-group">
            <label for="satuan">Satuan <span class="required">*</span></label>
            <select id="satuan" name="satuan" required>
              <option value="">-- Pilih Satuan --</option>
              <option value="galon">Galon</option>
              <option value="botol">Botol</option>
              <option value="jerigen">Jerigen</option>
              <option value="dus">Dus</option>
              <option value="pcs">Pcs</option>
              <option value="karton">Karton</option>
            </select>
          </div>

          <div class="form-group">
            <label for="harga">Harga (Rp) <span class="required">*</span></label>
            <div class="input-prefix">
              <span class="prefix">Rp</span>
              <input type="number" id="harga" name="harga"
                     placeholder="0" min="0" required />
            </div>
          </div>

          <div class="form-group">
            <label for="tanggalMasuk">Tanggal Masuk <span class="required">*</span></label>
            <input type="date" id="tanggalMasuk" name="tanggalMasuk" required />
          </div>

          <div class="form-group">
            <label for="supplier">Supplier <span class="required">*</span></label>
            <input type="text" id="supplier" name="supplier"
                   placeholder="Nama pemasok barang" required />
          </div>

          <div class="form-group form-full">
            <label for="fotoBarang">Foto Barang</label>
            <div class="file-upload" id="fileUploadArea">
              <input type="file" id="fotoBarang" name="fotoBarang"
                     accept="image/*" onchange="previewFoto(event)" />
              <div class="file-upload-content" id="fileUploadContent">
                <span class="file-icon">📷</span>
                <p>Klik atau seret file ke sini</p>
                <small>Format: JPG, PNG, WEBP — Maks 2MB</small>
              </div>
              <img id="fotoPreview" class="foto-preview" alt="Preview foto barang" />
            </div>
          </div>

          <div class="form-group form-full">
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="4"
                      placeholder="Deskripsi tambahan tentang barang (opsional)..."></textarea>
          </div>

          <div class="form-actions form-full">
            <button type="button" class="btn btn-outline" onclick="resetForm()">
              🗑 Reset
            </button>
            <button type="submit" class="btn btn-primary">
              💾 Simpan Data
            </button>
          </div>

        </form>
      </div>
    </div>
  </section>

  <footer class="footer" id="kontak">
    <div class="footer-wave">
      <svg viewBox="0 0 1200 60" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
        <path d="M0,30 C200,60 400,0 600,30 C800,60 1000,0 1200,30 L1200,0 L0,0 Z" fill="#f0f9ff"/>
      </svg>
    </div>

    <div class="container">
      <div class="footer-grid">

        <div class="footer-col">
          <div class="footer-logo">
            <div class="logo-icon">💧</div>
            <div class="logo-text">
              <span class="logo-main">BioAqua</span>
              <span class="logo-sub">Lab</span>
            </div>
          </div>
          <p class="footer-desc">
            BioAqua Lab adalah penyedia air minum isi ulang berkualitas tinggi
            yang telah melayani ribuan pelanggan sejak 2017. Kami berkomitmen
            menyediakan air sehat untuk kehidupan yang lebih baik.
          </p>
          <div class="footer-badges">
            <span>✅ SNI Certified</span>
            <span>✅ BPOM Approved</span>
          </div>
        </div>

        <div class="footer-col">
          <h3 class="footer-heading">Kontak Kami</h3>
          <ul class="footer-contact">
            <li>
              <span class="contact-icon">📍</span>
              <span>Jl. Tirta Murni No. 24, Bandung, Jawa Barat 40123</span>
            </li>
            <li>
              <span class="contact-icon">📞</span>
              <a href="tel:+6222123456">+62 22 123-456</a>
            </li>
            <li>
              <span class="contact-icon">📱</span>
              <a href="https://wa.me/6281234567890">+62 812-3456-7890 (WhatsApp)</a>
            </li>
            <li>
              <span class="contact-icon">✉️</span>
              <a href="mailto:info@bioaqua.lab">info@bioaqua.lab</a>
            </li>
            <li>
              <span class="contact-icon">🕐</span>
              <span>Senin–Sabtu: 07.00 – 18.00 WIB</span>
            </li>
          </ul>
        </div>

        <div class="footer-col">
          <h3 class="footer-heading">Ikuti Kami</h3>
          <p class="footer-sosmed-desc">
            Dapatkan informasi promo, tips sehat, dan update produk terbaru
            melalui media sosial kami.
          </p>
          <div class="sosmed-links">
            <a href="#" class="sosmed-btn instagram" aria-label="Instagram">
              <span>📸</span> Instagram
            </a>
            <a href="#" class="sosmed-btn facebook" aria-label="Facebook">
              <span>👍</span> Facebook
            </a>
            <a href="#" class="sosmed-btn whatsapp" aria-label="WhatsApp">
              <span>💬</span> WhatsApp
            </a>
            <a href="#" class="sosmed-btn tiktok" aria-label="TikTok">
              <span>🎵</span> TikTok
            </a>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <p>© 2025 <strong>BioAqua Lab</strong>. Dibuat untuk tugas Praktikum Pemrograman Web.</p>
        <p class="footer-credit">Air sehat, hidup berkah 💧</p>
      </div>
    </div>
  </footer>

  <!-- Tombol Kembali ke Atas -->
  <button class="back-to-top" id="backToTop" aria-label="Kembali ke atas">↑</button>

  <!-- Notifikasi Toast -->
  <div class="toast" id="toast">
    <span id="toastMsg">Pesan berhasil!</span>
  </div>

  <div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">📊 Statistik Kunjungan Anda</h5>
            <p class="text-muted small">Data kunjungan halaman katalog BioAqua Lab</p>

            <div class="row text-center my-3">
                <div class="col-md-4">
                    <div class="card bg-primary text-white p-3">
                        <h2 class="fw-bold mb-0">{{ session('kunjungan', 0) }}</h2>
                        <small>Total Kunjungan</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white p-3">
                        <h6 class="fw-bold mb-0">{{ session('pertama_kunjungan', '-') }}</h6>
                        <small>Kunjungan Pertama</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-info text-white p-3">
                        <h6 class="fw-bold mb-0">{{ session('terakhir_kunjungan', '-') }}</h6>
                        <small>Kunjungan Terakhir</small>
                    </div>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('reset.kunjungan') }}"
                   class="btn btn-danger"
                   onclick="return confirm('Yakin ingin mereset hitungan kunjungan?')">
                    🔄 Reset Hitungan
                </a>
            </div>
        </div>
    </div>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>

@endsection

{{-- ✅ @push di luar @section tapi BUKAN setelah @endsection yang menutup konten --}}
@push('scripts')
<script>
    async function ambilCuaca() {
        try {
            const response = await fetch('https://wttr.in/Jember?format=j1');
            const data = await response.json();

            const suhu      = data.current_condition[0].temp_C;
            const deskripsi = data.current_condition[0].weatherDesc[0].value;
            const kota      = data.nearest_area[0].areaName[0].value;

            document.getElementById('cuaca-kota').textContent      = kota;
            document.getElementById('cuaca-suhu').textContent      = suhu;
            document.getElementById('cuaca-deskripsi').textContent = deskripsi;

            document.getElementById('cuaca-loading').style.display = 'none';
            document.getElementById('cuaca-result').style.display  = 'block';

        } catch (error) {
            document.getElementById('cuaca-loading').style.display = 'none';
            document.getElementById('cuaca-error').style.display   = 'block';
        }
    }

    ambilCuaca();
</script>
@endpush