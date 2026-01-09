<?php 
$base = Config::base_url();
?>

<link rel="stylesheet" href="<?= $base ?>/public/assets/css/biografi.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<div class="bio-container">

    <!-- ================= NAVBAR BIO ================= -->
    <div class="bio-nav">
        <button class="active" onclick="showBio('silvia', this)">Andini</button>
        <button onclick="showBio('andini', this)">Silvia</button>
        <button onclick="showBio('mutiara', this)">Mutiara</button>
        <button onclick="showBio('winda', this)">Winda</button>
        <button onclick="showBio('sundari', this)">Sundari</button>
    </div>
<script>
const dataBio = {
        andini: {
        nama: "Andini Wijayanti",
        role: "Mahasiswi RPL",
        desc: "Saya tertarik pada analisis sistem informasi dan perancangan sistem berbasis kebutuhan pengguna.",
        foto: "<?= $base ?>/public/img/bio/andini.png"
    },
    silvia: {
        nama: "Silvia Agustina",
        role: "Mahasiswi RPL",
        desc: "Saya adalah mahasiswa yang memiliki minat kuat sebagai system analyst, khususnya dalam analisis kebutuhan sistem, perancangan alur proses, dan pemodelan sistem informasi.",
        foto: "<?= $base ?>/public/img/bio/silvia.png"
    },
    mutiara: {
        nama: "Mutiara Botani",
        role: "Mahasiswi RPL",
        desc: "Saya memiliki ketertarikan pada sistem informasi, analisis proses, dan dokumentasi sistem.",
        foto: "<?= $base ?>/public/img/bio/mutiara.png"
    },
    winda: {
        nama: "Winda Aryanti",
        role: "Mahasiswi RPL",
        desc: "Saya fokus pada analisis sistem dan pengembangan aplikasi web.",
        foto: "<?= $base ?>/public/img/bio/winda.png"
    },
    sundari: {
        nama: "Sundari Rosdiana",
        role: "Mahasiswi RPL",
        desc: "Saya tertarik pada pemodelan sistem informasi yang terstruktur dan efektif.",
        foto: "<?= $base ?>/public/img/bio/sundari.png"
    }
};

function showBio(key, el) {
    document.getElementById("bio-name").innerText = dataBio[key].nama;
    document.getElementById("bio-role").innerText = dataBio[key].role;
    document.getElementById("bio-desc").innerText = dataBio[key].desc;
    document.getElementById("bio-photo").src = dataBio[key].foto;

    document.querySelectorAll(".bio-nav button")
        .forEach(btn => btn.classList.remove("active"));
    el.classList.add("active");
}
</script>
