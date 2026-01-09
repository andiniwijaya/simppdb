<?php 
$base = Config::base_url();
?>

<link rel="stylesheet" href="<?= $base ?>/public/assets/css/biografi.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<div class="bio-container">

    <!-- ================= NAVBAR BIO ================= -->
    <div class="bio-nav">
        <button class="active" onclick="showBio('andini', this)">Andini</button>
        <button onclick="showBio('mutiara', this)">Mutiara</button>
        <button onclick="showBio('silvia', this)">Silvia</button>
        <button onclick="showBio('sundari', this)">Sundari</button>
        <button onclick="showBio('winda', this)">Winda</button>
    </div>

    <!-- ================= BIO CONTENT ================= -->
    <section class="bio-hero">

        <div class="bio-text">
            <h5>Hello, It’s Me</h5>
            <h1 id="bio-name">Andini Wijayanti</h1>
            <h4 id="bio-role">Project Manager</h4>

            <p id="bio-desc">
                Saya adalah mahasiswi RPL yang berperan sebagai Project Manager dalam
                pengembangan sistem informasi. Saya bertanggung jawab dalam mengatur
                alur kerja tim, menyusun perencanaan proyek, serta memastikan setiap
                tahapan pengembangan berjalan sesuai target. Saya juga aktif dalam
                komunikasi antara tim teknis dan pengguna agar sistem yang dibangun
                sesuai dengan kebutuhan.
            </p>
        </div>

        <div class="bio-photo">
            <img id="bio-photo" src="<?= $base ?>/public/img/bio/andini.png" alt="Andini">
        </div>

    </section>

</div>
<script>
const dataBio = {
    andini: {
        nama: "Andini Wijayanti",
        role: "Project Manager",
        desc: "Saya adalah mahasiswi RPL yang berperan sebagai Project Manager dalam pengembangan sistem informasi. Saya bertanggung jawab dalam mengatur alur kerja tim, menyusun perencanaan proyek, serta memastikan setiap tahapan pengembangan berjalan sesuai target.",
        foto: "<?= $base ?>/public/img/bio/andini.png",
        ig: "https://instagram.com/andini",
        github: "#",
        linkedin: "#"
    },

    mutiara: {
        nama: "Mutiara Botani",
        role: "Programmer",
        desc: "Saya berperan sebagai Programmer yang fokus pada implementasi sistem, pengembangan fitur, serta perbaikan bug agar aplikasi berjalan optimal.",
        foto: "<?= $base ?>/public/img/bio/mutiara.png",
        ig: "https://instagram.com/mutiara",
        github: "https://github.com/mutiara",
        linkedin: "#"
    },

    silvia: {
        nama: "Silvia Agustina",
        role: "System Analyst",
        desc: "Saya memiliki minat kuat sebagai System Analyst, khususnya dalam analisis kebutuhan sistem, perancangan alur proses, dan pemodelan sistem informasi.",
        foto: "<?= $base ?>/public/img/bio/silvia.png",
        ig: "https://instagram.com/silvia",
        github: "https://github.com/silvia",
        linkedin: "https://linkedin.com/in/silvia"
    },

    sundari: {
        nama: "Sundari Rosdiana",
        role: "System Documentation",
        desc: "Saya fokus pada dokumentasi sistem, pembuatan laporan, dan pendokumentasian alur kerja aplikasi secara terstruktur.",
        foto: "<?= $base ?>/public/img/bio/sundari.png",
        ig: "https://instagram.com/sundari",
        github: "#",
        linkedin: "#"
    },

    winda: {
        nama: "Winda Aryanti",
        role: "Web Developer",
        desc: "Saya tertarik pada pengembangan aplikasi web, khususnya desain antarmuka dan pengalaman pengguna yang responsif.",
        foto: "<?= $base ?>/public/img/bio/winda.png",
        ig: "https://instagram.com/winda",
        github: "https://github.com/winda",
        linkedin: "#"
    }
};

function showBio(key, el) {
    document.getElementById("bio-name").innerText = dataBio[key].nama;
    document.getElementById("bio-role").innerText = dataBio[key].role;
    document
