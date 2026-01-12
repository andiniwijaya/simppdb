<?php 
$base = Config::base_url();
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Biografi Tim</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand bg-white shadow-sm sticky-top">
    <div class="container justify-content-center gap-2">
        <a class="btn btn-outline-primary btn-sm" href="#andini">Andini</a>
        <a class="btn btn-outline-primary btn-sm" href="#mutiara">Mutiara</a>
        <a class="btn btn-outline-primary btn-sm" href="#silvia">Silvia</a>
        <a class="btn btn-outline-primary btn-sm" href="#sundari">Sundari</a>
        <a class="btn btn-outline-primary btn-sm" href="#winda">Winda</a>
    </div>
</nav>

<!-- ================= CONTENT ================= -->
<div class="container py-5">

    <!-- ANDINI -->
    <section id="andini" class="row align-items-center mb-5">
        <div class="col-md-7">
            <h6 class="text-primary">Hello, It’s Me</h6>
            <h2 class="fw-bold">Andini Wijayanti</h2>
            <h5 class="text-muted">Project Manager</h5>
            <p>
                Saya adalah mahasiswi RPL yang berperan sebagai Project Manager
                dalam pengembangan sistem informasi. Bertanggung jawab mengatur
                alur kerja tim dan memastikan target tercapai.
            </p>
            <div class="d-flex gap-3">
                <a href="https://www.instagram.com/ann.wijay" target="_blank" class="text-dark fs-4">
                    <i class="bi bi-instagram"></i>
                </a>
            </div>
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
                Saya berperan sebagai Programmer yang fokus pada pengembangan
                fitur aplikasi, penulisan kode, serta perbaikan bug.
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
                Saya fokus pada analisis kebutuhan sistem, perancangan proses
                bisnis, serta menjembatani kebutuhan pengguna dengan tim pengembang.
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
                Saya bertanggung jawab pada dokumentasi sistem, penyusunan laporan,
                serta pendokumentasian alur kerja aplikasi.
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
                Saya tertarik pada pengembangan aplikasi web, khususnya
                pada desain antarmuka dan pengalaman pengguna.
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
