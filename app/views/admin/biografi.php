<?php 
$base = Config::base_url();
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Biografi Tim RPL</title>

<link rel="stylesheet" href="<?= $base ?>/public/assets/css/biografi.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav class="bio-navbar">
    <ul>
        <li class="active" onclick="showBio('silvia', this)">Silvia</li>
        <li onclick="showBio('andini', this)">Andini</li>
        <li onclick="showBio('mutiara', this)">Mutiara</li>
        <li onclick="showBio('winda', this)">Winda</li>
        <li onclick="showBio('sundari', this)">Sundari</li>
    </ul>
</nav>

<!-- ================= BIOGRAFI ================= -->
<section class="bio-hero">

    <!-- ===== TEXT ===== -->
    <div class="bio-text">
        <h5>Hello, It’s Me</h5>
        <h1 id="bio-name">Silvia Agustina</h1>
        <h4 id="bio-role">Mahasiswi RPL</h4>

        <p id="bio-desc">
            Saya adalah mahasiswa yang memiliki minat kuat sebagai system analyst,
            khususnya dalam analisis kebutuhan sistem, perancangan alur proses,
            pemodelan sistem informasi, serta memastikan sistem sesuai kebutuhan pengguna.
        </p>

        <div class="bio-social">
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-github"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
        </div>
    </div>

    <!-- ===== FOTO ===== -->
    <div class="bio-photo">
        <img id="bio-photo" src="<?= $base ?>/public/img/bio/silvia.png" alt="Foto">
    </div>

</section>

<!-- ================= SCRIPT ================= -->
<script>
const dataBio = {
    silvia: {
        nama: "Silvia Agustina",
        role: "Mahasiswi RPL",
        deskripsi: "Saya adalah mahasiswa yang memiliki minat kuat sebagai system analyst, dengan fokus pada analisis kebutuhan sistem, perancangan proses bisnis, pemodelan sistem, serta dokumentasi sistem informasi.",
        foto: "<?= $base ?>/public/img/bio/silvia.png"
    },
    andini: {
        nama: "Andini Wijayanti",
        role: "Mahasiswi RPL",
        deskripsi: "Saya memiliki ketertarikan pada pengembangan dan analisis sistem informasi, khususnya dalam penyusunan alur sistem dan pemetaan kebutuhan pengguna.",
        foto: "<?= $base ?>/public/img/bio/andini.png"
    },
    mutiara: {
        nama: "Mutiara Botani",
        role: "Mahasiswi RPL",
        deskripsi: "Saya tertarik pada dunia teknologi informasi, analisis sistem, serta perancangan solusi sistem yang efektif dan mudah digunakan.",
        foto: "<?= $base ?>/public/img/bio/mutiara.png"
    },
    winda: {
        nama: "Winda Aryanti",
        role: "Mahasiswi RPL",
        deskripsi: "Saya memiliki minat dalam analisis sistem dan pengembangan aplikasi berbasis web yang berorientasi pada kebutuhan pengguna.",
        foto: "<?= $base ?>/public/img/bio/winda.png"
    },
    sundari: {
        nama: "Sundari Rosdiana",
        role: "Mahasiswi RPL",
        deskripsi: "Saya tertarik pada pemodelan sistem informasi dan perancangan sistem yang terstruktur, efisien, dan mudah dipahami.",
        foto: "<?= $base ?>/public/img/bio/sundari.png"
    }
};

function showBio(key, el) {
    document.getElementById("bio-name").innerText = dataBio[key].nama;
    document.getElementById("bio-role").innerText = dataBio[key].role;
    document.getElementById("bio-desc").innerText = dataBio[key].deskripsi;
    document.getElementById("bio-photo").src = dataBio[key].foto;

    document.querySelectorAll(".bio-navbar li").forEach(li => li.classList.remove("active"));
    el.classList.add("active");
}
</script>

</body>
</html>
