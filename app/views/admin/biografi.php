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

<!-- NAVBAR -->
<nav class="navbar navbar-expand bg-white shadow-sm sticky-top">
    <div class="container justify-content-center gap-2">
        <a class="btn btn-outline-primary btn-sm" href="#andini">Andini</a>
        <a class="btn btn-outline-primary btn-sm" href="#mutiara">Mutiara</a>
        <a class="btn btn-outline-primary btn-sm" href="#silvia">Silvia</a>
        <a class="btn btn-outline-primary btn-sm" href="#sundari">Sundari</a>
        <a class="btn btn-outline-primary btn-sm" href="#winda">Winda</a>
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
                dalam menyusun perencanaan proyek, mengatur pembagian tugas tim,
                mengoordinasikan komunikasi antar anggota, serta memastikan setiap
                tahapan pengembangan sistem berjalan sesuai dengan jadwal dan
                kebutuhan pengguna.
            </p>
            <a href="https://www.instagram.com/ann.wijay" target="_blank" class="text-dark fs-4">
                <i class="bi bi-instagram"></i>
            </a>
        </div>
        <div class="col-md-5 text-center">
            <img src="<?= $base ?>/public/img/bio/andini.png" class="img-fluid rounded shadow" style="max-width:300px">
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
                dengan fokus utama pada penulisan dan implementasi kode program.
                Saya bertanggung jawab mengembangkan fitur-fitur aplikasi sesuai
                dengan kebutuhan sistem, melakukan pengujian fungsional, serta
                memperbaiki bug agar aplikasi dapat berjalan dengan stabil,
                efisien, dan mudah digunakan oleh pengguna.
            </p>
            <a href="https://www.instagram.com/mutiarabotani/" target="_blank" class="text-dark fs-4">
                <i class="bi bi-instagram"></i>
            </a>
        </div>
        <div class="col-md-5 text-center">
            <img src="<?= $base ?>/public/img/bio/mutiara.png" class="img-fluid rounded shadow" style="max-width:300px">
        </div>
    </section>

    <!-- SILVIA -->
    <section id="silvia" class="row align-items-center mb-5">
        <div class="col-md-7">
            <h6 class="text-primary">Hello, It’s Me</h6>
            <h2 class="fw-bold">Silvia Agustina</h2>
            <h5 class="text-muted">System Analyst</h5>
            <p>
                Saya berperan sebagai System Analyst yang bertanggung jawab dalam
                menganalisis kebutuhan sistem informasi PPDB. Tugas saya meliputi
                pengumpulan kebutuhan pengguna, pemodelan proses bisnis, pembuatan
                use case diagram, serta membantu menerjemahkan kebutuhan pengguna
                menjadi spesifikasi sistem yang dapat dipahami dan diimplementasikan
                oleh tim pengembang.
            </p>
            <a href="https://www.instagram.com/shakipiya/" target="_blank" class="text-dark fs-4">
                <i class="bi bi-instagram"></i>
            </a>
        </div>
        <div class="col-md-5 text-center">
            <img src="<?= $base ?>/public/img/bio/silvia.png" class="img-fluid rounded shadow" style="max-width:300px">
        </div>
    </section>

    <!-- SUNDARI -->
    <section id="sundari" class="row align-items-center mb-5 flex-md-row-reverse">
        <div class="col-md-7">
            <h6 class="text-primary">Hello, It’s Me</h6>
            <h2 class="fw-bold">Sundari Rosdiana</h2>
            <h5 class="text-muted">System Documentation</h5>
            <p>
                Saya berperan dalam bidang dokumentasi sistem, khususnya dalam
                penyusunan laporan proyek, dokumentasi alur kerja aplikasi, serta
                pencatatan setiap tahapan pengembangan sistem PPDB. Dokumentasi
                ini bertujuan agar sistem yang dikembangkan mudah dipahami,
                dipelajari, dan dikembangkan kembali di masa mendatang.
            </p>
            <a href="https://www.instagram.com/dianadariii" target="_blank" class="text-dark fs-4">
                <i class="bi bi-instagram"></i>
            </a>
        </div>
        <div class="col-md-5 text-center">
            <img src="<?= $base ?>/public/img/bio/sundari.png" class="img-fluid rounded shadow" style="max-width:300px">
        </div>
    </section>

    <!-- WINDA -->
    <section id="winda" class="row align-items-center">
        <div class="col-md-7">
            <h6 class="text-primary">Hello, It’s Me</h6>
            <h2 class="fw-bold">Winda Aryanti</h2>
            <h5 class="text-muted">Web Developer</h5>
            <p>
                Saya berperan sebagai Web Developer yang fokus pada pengembangan
                antarmuka aplikasi PPDB. Saya bertanggung jawab dalam merancang
                tampilan halaman web agar responsif, mudah digunakan, dan memiliki
                pengalaman pengguna yang baik. Selain itu, saya juga membantu
                mengintegrasikan tampilan dengan fungsi sistem yang telah dibuat.
            </p>
            <a href="https://www.instagram.com/wnd_arynt/" target="_blank" class="text-dark fs-4">
                <i class="bi bi-instagram"></i>
            </a>
        </div>
        <div class="col-md-5 text-center">
            <img src="<?= $base ?>/public/img/bio/winda.png" class="img-fluid rounded shadow" style="max-width:300px">
        </div>
    </section>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
