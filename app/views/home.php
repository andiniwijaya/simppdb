<?php 
$base = Config::base_url();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP PGRI ARJASARI | PPDB Online 2026/2027</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= $base ?>/public/assets/css/home.css">
</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-dark fixed-top">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center" href="<?= $base ?>">
            <img src="<?= $base ?>/public/img/logo_smp.png" alt="Logo">
            <strong>SMP PGRI ARJASARI</strong>
        </a>

        <!-- TOMBOL MENU -->
        <button class="menu-btn"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#sideMenu"
                aria-expanded="false">
            <span>Menu</span>
            <span class="hamburger"></span>
        </button>
    </div>
</nav>

<!-- ================= SIDE MENU ================= -->
<div class="collapse side-menu" id="sideMenu">
    <ul class="menu-list">
        <li><a href="<?= $base ?>">Beranda</a></li>
        <li><a href="#profil">Profil</a></li>
        <li><a href="#info">Informasi</a></li>
        <li><a href="#fasilitas">Fasilitas</a></li>
        <li><a href="#ekskul">Ekstrakurikuler</a></li>
        <li><a href="#lokasi">Lokasi</a></li>
        <li class="mt-3">
            <a href="<?= $base ?>/login" class="btn btn-warning w-100 fw-semibold">
                Login
            </a>
        </li>
    </ul>
</div>

<!-- ================= HERO ================= -->
<section class="hero">
    <div>
        <h1>PPDB ONLINE 2026/2027</h1>
        <h3>SMP PGRI ARJASARI</h3>
        <p class="lead">Membentuk Generasi Berkarakter dan Berprestasi</p>
        <a href="<?= $base ?>/login" class="btn-daftar">Daftar Sekarang</a>
    </div>
</section>

<!-- ================= PROFIL ================= -->
<section id="profil" class="container py-5">
    <h2 class="section-title text-center">Tentang Sekolah</h2>
    <p class="text-center">
        SMP PGRI Arjasari berdiri sejak tahun 1976 dan berkomitmen mencetak
        generasi yang unggul, berkarakter, dan berprestasi.
    </p>
</section>

<!-- ================= VISI MISI ================= -->
<section class="py-5 visi-section">
    <div class="container">
        <h2 class="section-title text-center">Visi & Misi</h2>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card-visi">
                    <h4 class="fw-bold text-primary">Visi</h4>
                    <p>
                        Terbentuknya siswa yang Cerdas, Agamis, Kreatif,
                        Edukatif, dan Berprestasi (CAKEP).
                    </p>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card-visi">
                    <h4 class="fw-bold text-primary">Misi</h4>
                    <ul>
                        <li>Meningkatkan mutu pendidikan</li>
                        <li>Membentuk karakter disiplin</li>
                        <li>Menguasai teknologi dan IPTEK</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= FASILITAS ================= -->
<section id="fasilitas" class="fasilitas-section">
    <div class="container">
        <h2 class="section-title text-center">Fasilitas Sekolah</h2>

        <div class="row g-4 mt-4">
            <div class="col-md-3 col-sm-6"><div class="fasilitas-card"><div class="fasilitas-icon">🏫</div><h6>Ruang Kelas</h6></div></div>
            <div class="col-md-3 col-sm-6"><div class="fasilitas-card"><div class="fasilitas-icon">📚</div><h6>Perpustakaan</h6></div></div>
            <div class="col-md-3 col-sm-6"><div class="fasilitas-card"><div class="fasilitas-icon">💻</div><h6>Lab Komputer</h6></div></div>
            <div class="col-md-3 col-sm-6"><div class="fasilitas-card"><div class="fasilitas-icon">🕌</div><h6>Mushola</h6></div></div>
            <div class="col-md-3 col-sm-6"><div class="fasilitas-card"><div class="fasilitas-icon">⚽</div><h6>Lapangan</h6></div></div>
            <div class="col-md-3 col-sm-6"><div class="fasilitas-card"><div class="fasilitas-icon">🏢</div><h6>Aula</h6></div></div>
            <div class="col-md-3 col-sm-6"><div class="fasilitas-card"><div class="fasilitas-icon">🩺</div><h6>UKS</h6></div></div>
            <div class="col-md-3 col-sm-6"><div class="fasilitas-card"><div class="fasilitas-icon">📶</div><h6>Wi-Fi</h6></div></div>
        </div>
    </div>
</section>

<!-- ================= EKSKUL ================= -->
<section id="ekskul" class="container py-5">
    <h2 class="section-title text-center">Ekstrakurikuler</h2>
    <div class="row g-4 text-center mt-4">
        <div class="col-md-3 col-sm-6"><div class="fasilitas-card">🎒 Pramuka</div></div>
        <div class="col-md-3 col-sm-6"><div class="fasilitas-card">🚩 Paskibra</div></div>
        <div class="col-md-3 col-sm-6"><div class="fasilitas-card">⚽ Futsal</div></div>
        <div class="col-md-3 col-sm-6"><div class="fasilitas-card">🥋 Pencak Silat</div></div>
    </div>
</section>

<!-- ================= INFO ================= -->
<section id="info" class="container py-5">
    <h2 class="section-title text-center">Informasi PPDB</h2>

    <div class="row">
        <div class="col-md-4"><div class="info-card">🗓 Jan – Jun 2026</div></div>
        <div class="col-md-4"><div class="info-card">📋 Persyaratan Lengkap</div></div>
        <div class="col-md-4"><div class="info-card">📞 0821-2873-5795</div></div>
    </div>
</section>

<!-- ================= MAP ================= -->
<section id="lokasi" class="map container mb-5">
    <iframe
        src="https://www.google.com/maps?q=SMP%20PGRI%20Arjasari&output=embed"
        loading="lazy">
    </iframe>
</section>

<!-- ================= FOOTER ================= -->
<footer>
    <p>© 2025 SMP PGRI ARJASARI | Sistem PPDB Online</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
