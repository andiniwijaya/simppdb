<?php 
$base = Config::base_url();
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Biografi Tim</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- ================= AUDIO ================= -->
<audio id="bg-music" loop>
    <source src="<?= $base ?>/public/background.mp3" type="audio/mpeg">
</audio>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand bg-white shadow-sm sticky-top">
    <div class="container justify-content-center gap-2">
        <a class="btn btn-outline-primary btn-sm bio-link" href="#andini">Andini</a>
        <a class="btn btn-outline-primary btn-sm bio-link" href="#mutiara">Mutiara</a>
        <a class="btn btn-outline-primary btn-sm bio-link" href="#silvia">Silvia</a>
        <a class="btn btn-outline-primary btn-sm bio-link" href="#sundari">Sundari</a>
        <a class="btn btn-outline-primary btn-sm bio-link" href="#winda">Winda</a>
    </div>
</nav>

<div class="container py-5">

    <!-- ANDINI -->
    <section id="andini" class="row align-items-center mb-5">
        <div class="col-md-7">
            <h6 class="text-primary">Hello, It’s Me</h6>
            <h2 class="fw-bold">Andini Wijayanti</h2>
            <h5 class="text-muted">Project Manager</h5>
            <p>
                Saya adalah mahasiswi RPL yang berperan sebagai Project Manager
                dalam pengembangan sistem informasi PPDB. Saya bertanggung jawab
                menyusun perencanaan proyek, mengatur pembagian tugas tim,
                mengoordinasikan komunikasi, serta memastikan setiap tahapan
                pengembangan sistem berjalan sesuai jadwal dan kebutuhan pengguna.
            </p>
            <a href="https://www.instagram.com/ann.wijay" target="_blank" class="text-dark fs-4">
                <i class="bi bi-instagram"></i>
            </a>
        </div>
        <div class="col-md-5 text-center">
            <img src="<?= $base ?>/public/img/bio/andini.png"
                 class="img-fluid rounded shadow"
                 style="max-width:300px">
        </div>
    </section>

    <!-- MUTIARA -->
    <section id="mutiara" class="row align-items-center mb-5 flex-md-row-reverse">
        <div class="col-md-7">
            <h6 class="text-primary">Hello, It’s Me</h6>
            <h2 class="fw-bold">Mutiara Botani</h2>
            <h5 class="text-muted">Programmer</h5>
            <p>
                Saya berperan sebagai Programmer dalam pengembangan sistem PPDB,
                dengan fokus pada penulisan dan implementasi kode program,
                pengujian fungsional, serta perbaikan bug agar aplikasi berjalan
                stabil, efisien, dan optimal.
            </p>
            <a href="https://www.instagram.com/mutiarabotani/" target="_blank" class="text-dark fs-4">
                <i class="bi bi-instagram"></i>
            </a>
        </div>
        <div class="col-md-5 text-center">
            <img src="<?= $base ?>/public/img/bio/mutiara.png"
                 class="img-fluid rounded shadow"
                 style="max-width:300px">
        </div>
    </section>

    <!-- SILVIA -->
    <section id="silvia" class="row align-items-center mb-5">
        <div class="col-md-7">
            <h6 class="text-primary">Hello, It’s Me</h6>
            <h2 class="fw-bold">Silvia Agustina</h2>
            <h5 class="text-muted">System Analyst</h5>
            <p>
                Saya bertanggung jawab dalam analisis kebutuhan sistem PPDB,
                pemodelan proses bisnis, pembuatan use case, serta membantu
                menerjemahkan kebutuhan pengguna ke dalam spesifikasi sistem
                yang dapat diimplementasikan oleh tim pengembang.
            </p>
            <a href="https://www.instagram.com/shakipiya/" target="_blank" class="text-dark fs-4">
                <i class="bi bi-instagram"></i>
            </a>
        </div>
        <div class="col-md-5 text-center">
            <img src="<?= $base ?>/public/img/bio/silvia.png"
                 class="img-fluid rounded shadow"
                 style="max-width:300px">
        </div>
    </section>

    <!-- SUNDARI -->
    <section id="sundari" class="row align-items-center mb-5 flex-md-row-reverse">
        <div class="col-md-7">
            <h6 class="text-primary">Hello, It’s Me</h6>
            <h2 class="fw-bold">Sundari Rosdiana</h2>
            <h5 class="text-muted">System Documentation</h5>
            <p>
                Saya berperan dalam dokumentasi sistem PPDB, meliputi penyusunan
                laporan proyek, dokumentasi alur kerja aplikasi, serta pencatatan
                setiap tahapan pengembangan agar sistem mudah dipahami dan
                dikembangkan kembali.
            </p>
            <a href="https://www.instagram.com/dianadariii" target="_blank" class="text-dark fs-4">
                <i class="bi bi-instagram"></i>
            </a>
        </div>
        <div class="col-md-5 text-center">
            <img src="<?= $base ?>/public/img/bio/sundari.png"
                 class="img-fluid rounded shadow"
                 style="max-width:300px">
        </div>
    </section>

    <!-- WINDA -->
    <section id="winda" class="row align-items-center">
        <div class="col-md-7">
            <h6 class="text-primary">Hello, It’s Me</h6>
            <h2 class="fw-bold">Winda Aryanti</h2>
            <h5 class="text-muted">Web Developer</h5>
            <p>
                Saya bertanggung jawab pada pengembangan antarmuka web sistem PPDB,
                memastikan tampilan responsif, mudah digunakan, serta memberikan
                pengalaman pengguna yang baik melalui desain dan integrasi antarmuka.
            </p>
            <a href="https://www.instagram.com/wnd_arynt/" target="_blank" class="text-dark fs-4">
                <i class="bi bi-instagram"></i>
            </a>
        </div>
        <div class="col-md-5 text-center">
            <img src="<?= $base ?>/public/img/bio/winda.png"
                 class="img-fluid rounded shadow"
                 style="max-width:300px">
        </div>
    </section>

</div>

<!-- ================= AUDIO SCRIPT (KUNCI) ================= -->
<script>
const bgMusic = document.getElementById("bg-music");
let played = false;

// audio dipicu SAAT KLIK NAVBAR (user gesture)
document.querySelectorAll(".bio-link").forEach(link => {
    link.addEventListener("click", () => {
        if (!played) {
            bgMusic.volume = 0.4;
            bgMusic.play().catch(() => {});
            played = true;
        }
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
