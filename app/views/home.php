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
<nav class="navbar navbar-expand-lg fixed-top navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= $base ?>">
            <img src="<?= $base ?>/public/img/logo_smp.png" alt="Logo">
            <strong>SMP PGRI ARJASARI</strong>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= $base ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#profil">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#info">Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#fasilitas">Fasilitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#lokasi">Lokasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base ?>/login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ================= HERO ================= -->
<section class="hero">
    <div>
        <h1>PPDB ONLINE 2026/2027</h1>
        <h3>SMP PGRI ARJASARI</h3>
        <p class="lead">“Membentuk Generasi Berkarakter dan Berprestasi.”</p>
        <a href="<?= $base ?>/login" class="btn-daftar">Daftar Sekarang</a>
    </div>
</section>

<!-- ================= PROFIL ================= -->
<section id="profil" class="container py-5">
    <h2 class="section-title text-center">Tentang Sekolah</h2>
    <p class="text-center">
        SMP PGRI Arjasari berdiri sejak tahun 1976 dan berkomitmen
        mencetak generasi yang unggul, berkarakter, dan berprestasi.
    </p>
</section>

<!-- ================= VISI MISI ================= -->
<section class="py-5 visi-section">
    <div class="container">
        <h2 class="section-title text-center">Visi & Misi Sekolah</h2>

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
                        <li>Menguasai teknologi dan ilmu pengetahuan</li>
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
            <div class="col-md-3 col-sm-6">
                <div class="fasilitas-card">
                    <div class="fasilitas-icon">🏫</div>
                    <h6 class="fw-bold">Ruang Kelas</h6>
                    <p>Nyaman dan kondusif</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="fasilitas-card">
                    <div class="fasilitas-icon">📚</div>
                    <h6 class="fw-bold">Perpustakaan</h6>
                    <p>Koleksi buku lengkap</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="fasilitas-card">
                    <div class="fasilitas-icon">💻</div>
                    <h6 class="fw-bold">Lab Komputer</h6>
                    <p>Pembelajaran IT</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="fasilitas-card">
                    <div class="fasilitas-icon">🕌</div>
                    <h6 class="fw-bold">Mushola</h6>
                    <p>Tempat ibadah siswa</p>
                </div>

            <div class="col-md-3 col-sm-6">
                <div class="fasilitas-card">
                    <div class="fasilitas-icon">💻</div>
                    <h6 class="fw-bold">Lapangan olahraga</h6>
                    <p>Lapangan olahraga yang bersih dan luasp>
                </div>

                <div class="col-md-3 col-sm-6">
                <div class="fasilitas-card">
                    <div class="fasilitas-icon">💻</div>
                    <h6 class="fw-bold">Gedung Aula
                    <p>Gedung Aula yang luas</p>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= STATISTIK ================= -->
<section class="statistik">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="stat-box">30+</div>
                Guru
            </div>
            <div class="col-md-4">
                <div class="stat-box">250+</div>
                Siswa
            </div>
            <div class="col-md-4">
                <div class="stat-box">20+</div>
                Prestasi
            </div>
        </div>
    </div>
</section>

<!-- ================= INFO ================= -->
<section id="info" class="container py-5">
    <h2 class="section-title text-center">Informasi PPDB 2026</h2>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="info-card">
                <h5>🗓 Jadwal</h5>
                <p>Gelombang 1: Jan – Mar<br>Gelombang 2: Apr – Jun</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="info-card">
                <h5>📋 Persyaratan</h5>
                <p>KK, KTP Ortu, Ijazah SD, Akta Kelahiran, Pas Foto</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="info-card">
                <h5>📞 Kontak</h5>
                <p>0821-2873-5795</p>
            </div>
        </div>
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
