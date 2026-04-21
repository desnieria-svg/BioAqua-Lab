// 
const hamburger   = document.getElementById('hamburger');
const navMenu     = document.getElementById('navMenu');
const navbar      = document.getElementById('navbar');
const backToTop   = document.getElementById('backToTop');
const toast       = document.getElementById('toast');
const toastMsg    = document.getElementById('toastMsg');
const formPesanan = document.getElementById('formPesanan');
const produkGrid  = document.getElementById('produkGrid');

// -------------------------------------------------------
//  1. TOGGLE MENU HAMBURGER
//     Klik hamburger → tambah/hapus kelas 'active' & 'open'
// -------------------------------------------------------
if (hamburger) {
  hamburger.addEventListener('click', function () {
    const isOpen = navMenu.classList.toggle('open');
    hamburger.classList.toggle('active');

    // Update atribut aksesibilitas
    hamburger.setAttribute('aria-expanded', isOpen);
  });
}

// Tutup menu saat link diklik (UX mobile)
document.querySelectorAll('.nav-link').forEach(function (link) {
  link.addEventListener('click', function () {
    navMenu.classList.remove('open');
    hamburger.classList.remove('active');
    hamburger.setAttribute('aria-expanded', 'false');
  });
});

// -------------------------------------------------------
//  2. NAVBAR SCROLL EFFECT + BACK TO TOP VISIBILITY
// -------------------------------------------------------
window.addEventListener('scroll', function () {
  // Tambah shadow navbar saat scroll > 10px
  if (window.scrollY > 10) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }

  // Tampilkan tombol back-to-top setelah scroll > 350px
  if (window.scrollY > 350) {
    backToTop.classList.add('visible');
  } else {
    backToTop.classList.remove('visible');
  }
});

// -------------------------------------------------------
//  3. ANIMASI SCROLL — Intersection Observer
//     Elemen dengan [data-aos] muncul animasi saat terlihat
// -------------------------------------------------------
const aosObserver = new IntersectionObserver(
  function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('aos-visible');
        aosObserver.unobserve(entry.target); // cukup sekali
      }
    });
  },
  {
    threshold: 0.12,
    rootMargin: '0px 0px -40px 0px'
  }
);

// Amati semua elemen [data-aos]
document.querySelectorAll('[data-aos]').forEach(function (el, index) {
  // Delay bertahap untuk elemen dalam satu kelompok (stagger effect)
  el.style.transitionDelay = (index % 8) * 0.08 + 's';
  aosObserver.observe(el);
});

// -------------------------------------------------------
//  4. BACK TO TOP
// -------------------------------------------------------
if (backToTop) {
  backToTop.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}

// -------------------------------------------------------
//  5. ACTIVE LINK NAVBAR
//     Tandai link aktif sesuai seksi yang sedang terlihat
// -------------------------------------------------------
const allSections = document.querySelectorAll('section[id], footer[id]');
const allNavLinks = document.querySelectorAll('.nav-link');

window.addEventListener('scroll', function () {
  let currentId = '';

  allSections.forEach(function (section) {
    const top = section.getBoundingClientRect().top;
    if (top <= 90) {
      currentId = section.getAttribute('id');
    }
  });

  allNavLinks.forEach(function (link) {
    link.classList.remove('active');
    const href = link.getAttribute('href');
    if (href === '#' + currentId) {
      link.classList.add('active');
    }
  });
});

// -------------------------------------------------------
//  6. FILTER PRODUK
//     Filter berdasarkan checkbox kategori + range harga
// -------------------------------------------------------
function filterProduk() {
  // Kumpulkan kategori yang dicentang
  const checkedKat = [];
  document.querySelectorAll('.filter-group input[type="checkbox"][value]').forEach(function (cb) {
    if (cb.checked) checkedKat.push(cb.value);
  });

  const maxHarga = parseInt(document.getElementById('hargaRange').value);

  // Pisahkan antara filter kategori dan ketersediaan
  const kategoriPilihan = ['galon', 'botol', 'jerigen', 'cup'];
  const statusPilihan   = ['tersedia', 'habis'];

  const activeKat    = checkedKat.filter(v => kategoriPilihan.includes(v));
  const activeStatus = checkedKat.filter(v => statusPilihan.includes(v));

  const cards = produkGrid.querySelectorAll('.product-card');
  let terlihat = 0;

  cards.forEach(function (card) {
    const kat    = card.getAttribute('data-kategori');
    const harga  = parseInt(card.getAttribute('data-harga'));
    const status = card.getAttribute('data-status');

    const katOK    = activeKat.length === 0    || activeKat.includes(kat);
    const hargaOK  = harga <= maxHarga;
    const statusOK = activeStatus.length === 0 || activeStatus.includes(status);

    if (katOK && hargaOK && statusOK) {
      card.style.display = '';
      terlihat++;
    } else {
      card.style.display = 'none';
    }
  });

  // Tampilkan pesan jika tidak ada produk
  const noProdukEl = produkGrid.querySelector('.no-produk');
  if (terlihat === 0) {
    if (!noProdukEl) {
      const p = document.createElement('p');
      p.className = 'no-produk';
      p.textContent = '😕 Tidak ada produk yang sesuai filter.';
      produkGrid.appendChild(p);
    }
  } else {
    if (noProdukEl) noProdukEl.remove();
  }
}

// -------------------------------------------------------
//  7. UPDATE LABEL HARGA RANGE
// -------------------------------------------------------
function updateHargaFilter(input) {
  const label  = document.getElementById('hargaLabel');
  const rupiah = new Intl.NumberFormat('id-ID', {
    style: 'currency', currency: 'IDR', maximumFractionDigits: 0
  }).format(input.value);
  label.textContent = rupiah;
  filterProduk();
}

// -------------------------------------------------------
//  8. RESET FILTER
// -------------------------------------------------------
function resetFilter() {
  // Centang semua checkbox
  document.querySelectorAll('.filter-group input[type="checkbox"]').forEach(function (cb) {
    cb.checked = true;
  });

  // Reset range harga ke nilai max
  const rangeInput = document.getElementById('hargaRange');
  rangeInput.value = rangeInput.max;
  document.getElementById('hargaLabel').textContent = 'Rp 100.000';

  // Tampilkan semua produk
  produkGrid.querySelectorAll('.product-card').forEach(function (card) {
    card.style.display = '';
  });

  const noProdukEl = produkGrid.querySelector('.no-produk');
  if (noProdukEl) noProdukEl.remove();

  tampilToast('✅ Filter berhasil direset!');
}

// -------------------------------------------------------
//  9. FEEDBACK TOMBOL PESAN PRODUK
// -------------------------------------------------------
function tambahKeranjang(btn, namaProduk) {
  const asliTeks = btn.textContent;
  btn.textContent     = '✓ Dipesan!';
  btn.style.background = '#27ae60';
  btn.disabled         = true;

  tampilToast('🛒 ' + namaProduk + ' ditambahkan ke pesanan!');

  setTimeout(function () {
    btn.textContent     = asliTeks;
    btn.style.background = '';
    btn.disabled         = false;
  }, 2000);
}

// -------------------------------------------------------
//  10. PREVIEW FOTO BARANG
// -------------------------------------------------------
function previewFoto(event) {
  const file    = event.target.files[0];
  const preview = document.getElementById('fotoPreview');
  const content = document.getElementById('fileUploadContent');

  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      preview.src         = e.target.result;
      preview.style.display = 'block';
      content.style.display = 'none'; // sembunyikan placeholder teks
    };
    reader.readAsDataURL(file);
  }
}

// -------------------------------------------------------
//  11. VALIDASI & SUBMIT FORM
// -------------------------------------------------------
if (formPesanan) {
  formPesanan.addEventListener('submit', function (e) {
    e.preventDefault(); // Cegah reload halaman

    // Ambil nilai field wajib
    const kode     = document.getElementById('kodeBarang').value.trim();
    const nama     = document.getElementById('namaBarang').value.trim();
    const kategori = document.getElementById('kategori').value;
    const jumlah   = document.getElementById('jumlah').value;
    const satuan   = document.getElementById('satuan').value;
    const harga    = document.getElementById('harga').value;
    const tanggal  = document.getElementById('tanggalMasuk').value;
    const supplier = document.getElementById('supplier').value.trim();

    // Validasi manual
    const kosong = !kode || !nama || !kategori || !jumlah || !satuan || !harga || !tanggal || !supplier;

    if (kosong) {
      tampilToast('❌ Harap isi semua field yang wajib diisi!');
      // Sorot field yang kosong
      sorotFieldKosong();
      return;
    }

    if (parseInt(jumlah) < 1) {
      tampilToast('❌ Jumlah harus lebih dari 0!');
      return;
    }

    if (parseInt(harga) < 0) {
      tampilToast('❌ Harga tidak boleh negatif!');
      return;
    }

    // Jika lolos semua validasi
    tampilToast('✅ Data berhasil disimpan! Kode: ' + kode);

    // Simulasi: tampilkan ringkasan data (opsional - bisa dihapus)
    console.log('Data tersimpan:', { kode, nama, kategori, jumlah, satuan, harga, tanggal, supplier });

    // Reset form setelah 1 detik
    setTimeout(function () {
      resetForm();
    }, 1000);
  });
}

// -------------------------------------------------------
//  12. SOROT FIELD YANG KOSONG
// -------------------------------------------------------
function sorotFieldKosong() {
  const fieldWajib = ['kodeBarang', 'namaBarang', 'kategori', 'jumlah', 'satuan', 'harga', 'tanggalMasuk', 'supplier'];

  fieldWajib.forEach(function (id) {
    const el = document.getElementById(id);
    if (el && !el.value.trim()) {
      // Tambah border merah sementara
      el.style.borderColor = 'var(--danger)';
      el.addEventListener('input', function onInput() {
        el.style.borderColor = '';
        el.removeEventListener('input', onInput);
      }, { once: true });
    }
  });
}

// -------------------------------------------------------
//  13. RESET FORM
// -------------------------------------------------------
function resetForm() {
  if (formPesanan) {
    formPesanan.reset();

    // Reset preview foto
    const preview = document.getElementById('fotoPreview');
    const content = document.getElementById('fileUploadContent');
    if (preview) { preview.src = ''; preview.style.display = 'none'; }
    if (content) { content.style.display = ''; }

    // Set ulang tanggal ke hari ini
    setTanggalHariIni();

    tampilToast('🗑 Form berhasil direset.');
  }
}

// -------------------------------------------------------
//  14. NOTIFIKASI TOAST
//      Tampilkan pesan popup singkat di pojok kanan bawah
// -------------------------------------------------------
let toastTimer = null;

function tampilToast(pesan) {
  toastMsg.textContent = pesan;
  toast.classList.add('show');

  // Hapus timer sebelumnya agar tidak overlap
  if (toastTimer) clearTimeout(toastTimer);

  toastTimer = setTimeout(function () {
    toast.classList.remove('show');
  }, 3000); // hilang setelah 3 detik
}

// -------------------------------------------------------
//  15. SET TANGGAL HARI INI OTOMATIS
//      Field tanggal masuk diisi dengan tanggal sekarang
// -------------------------------------------------------
function setTanggalHariIni() {
  const inputTanggal = document.getElementById('tanggalMasuk');
  if (inputTanggal) {
    // Format YYYY-MM-DD yang dibutuhkan input type="date"
    const sekarang = new Date();
    const yyyy = sekarang.getFullYear();
    const mm   = String(sekarang.getMonth() + 1).padStart(2, '0');
    const dd   = String(sekarang.getDate()).padStart(2, '0');
    inputTanggal.value = yyyy + '-' + mm + '-' + dd;
  }
}

// -------------------------------------------------------
//  INISIALISASI — dijalankan saat halaman pertama dimuat
// -------------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
  // Set tanggal hari ini di form
  setTanggalHariIni();

  // Inisialisasi label harga filter
  const rangeInput = document.getElementById('hargaRange');
  if (rangeInput) {
    updateHargaFilter(rangeInput);
  }
});
// =======================================================
// 🔥 FITUR INVENTARIS (TAMBAHAN - TIDAK MENGGANGGU SCRIPT)
// =======================================================

let dataBarang = JSON.parse(localStorage.getItem("dataBarang")) || [];
let editIndex = -1;

// ==============================
// RENDER TABLE
// ==============================
function renderTable() {
  const tbody = document.querySelector("#dataTable tbody");
  if (!tbody) return;

  tbody.innerHTML = "";

  dataBarang.forEach((item, index) => {
    const row = `
      <tr>
        <td>${index + 1}</td>
        <td>${item.kode}</td>
        <td>${item.nama}</td>
        <td>${item.kategori}</td>
        <td>${item.jumlah}</td>
        <td>${item.satuan}</td>
        <td>Rp ${item.harga.toLocaleString()}</td>
        <td>${item.supplier}</td>
        <td>${item.tanggal}</td>
        <td>
          <button onclick="editData(${index})">Edit</button>
          <button onclick="hapusData(${index})">Hapus</button>
        </td>
      </tr>
    `;
    tbody.innerHTML += row;
  });
}

// ==============================
// TAMBAH / EDIT DATA
// ==============================
formPesanan.addEventListener("submit", function (e) {
  e.preventDefault();

  const item = {
    kode: document.getElementById("kodeBarang").value,
    nama: document.getElementById("namaBarang").value,
    kategori: document.getElementById("kategori").value,
    jumlah: Number(document.getElementById("jumlah").value),
    satuan: document.getElementById("satuan").value,
    harga: Number(document.getElementById("harga").value),
    supplier: document.getElementById("supplier").value,
    tanggal: document.getElementById("tanggalMasuk").value
  };

  if (editIndex === -1) {
    dataBarang.push(item);
  } else {
    dataBarang[editIndex] = item;
    editIndex = -1;
  }

  localStorage.setItem("dataBarang", JSON.stringify(dataBarang));

  renderTable();
  updateStatistikInventaris();
});

// ==============================
// EDIT
// ==============================
function editData(index) {
  const item = dataBarang[index];

  document.getElementById("kodeBarang").value = item.kode;
  document.getElementById("namaBarang").value = item.nama;
  document.getElementById("kategori").value = item.kategori;
  document.getElementById("jumlah").value = item.jumlah;
  document.getElementById("satuan").value = item.satuan;
  document.getElementById("harga").value = item.harga;
  document.getElementById("supplier").value = item.supplier;
  document.getElementById("tanggalMasuk").value = item.tanggal;

  editIndex = index;

  tampilToast("✏️ Mode edit aktif");

  // 🔥 AUTO SCROLL KE FORM
  const form = document.getElementById("formPesanan");
  if (form) {
    form.scrollIntoView({ behavior: "smooth" });
  }
}


// ==============================
// HAPUS
// ==============================
function hapusData(index) {
  if (confirm("Yakin mau hapus?")) {
    dataBarang.splice(index, 1);
    localStorage.setItem("dataBarang", JSON.stringify(dataBarang));
    renderTable();
    updateStatistikInventaris();
  }
}

// ==============================
// STATISTIK
// ==============================
function updateStatistikInventaris() {
  const total = dataBarang.length;
  const nilai = dataBarang.reduce((acc, item) => acc + (item.harga * item.jumlah), 0);
  const menipis = dataBarang.filter(item => item.jumlah < 5).length;

  const el = document.querySelector(".table-summary");
  if (el) {
    el.innerHTML = `
      Total Item: <b>${total}</b> |
      Total Nilai: <b>Rp ${nilai.toLocaleString()}</b> |
      Stok Menipis: <b>${menipis}</b>
    `;
  }
}

// ==============================
// LOAD AWAL
// ==============================
document.addEventListener("DOMContentLoaded", function () {
  renderTable();
  updateStatistikInventaris();
});
