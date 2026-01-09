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
        desc: "Saya adalah mahasiswi RPL yang berperan sebagai Project Manager dalam pengembangan sistem informasi. Saya bertanggung jawab dalam mengatur alur kerja tim, menyusun perencanaan proyek, serta memastikan setiap tahapan pengembangan berjalan sesuai target. Saya juga aktif dalam komunikasi antara tim teknis dan pengguna agar sistem yang dibangun sesuai dengan kebutuhan.",
        foto: "<?= $base ?>/public/img/bio/andini.png"
    },

    mutiara: {
        nama: "Mutiara Botani",
        role: "Programmer",
        desc: "Saya berperan sebagai Programmer yang fokus pada proses implementasi sistem. Saya bertanggung jawab dalam menulis kode program, mengembangkan fitur aplikasi, serta memastikan sistem berjalan dengan baik sesuai rancangan. Saya juga terbiasa melakukan perbaikan bug dan pengujian fungsi agar aplikasi siap digunakan.",
        foto: "<?= $base ?>/public/img/bio/mutiara.png"
    },

    silvia: {
        nama: "Silvia Agustina",
        role: "System Analyst",
        desc: "Saya memiliki minat yang kuat sebagai System Analyst, khususnya dalam menganalisis kebutuhan sistem dan merancang alur proses bisnis. Saya terbiasa membuat pemodelan sistem seperti flowchart dan diagram, serta menerjemahkan kebutuhan pengguna ke dalam spesifikasi sistem yang jelas dan terstruktur.",
        foto: "<?= $base ?>/public/img/bio/silvia.png"
    },

    sundari: {
        nama: "Sundari Rosdiana",
        role: "System Documentation",
        desc: "Saya berfokus pada dokumentasi sistem dan pendukung analisis, seperti pembuatan laporan, dokumentasi fitur, serta pencatatan alur kerja aplikasi. Saya memastikan setiap proses dan perubahan sistem terdokumentasi dengan rapi agar mudah dipahami dan dikembangkan di masa depan.",
        foto: "<?= $base ?>/public/img/bio/sundari.png"
    },

    winda: {
        nama: "Winda Aryanti",
        role: "Web Developer",
        desc: "Saya memiliki ketertarikan dalam pengembangan aplikasi berbasis web, terutama pada tampilan antarmuka dan pengalaman pengguna. Saya fokus pada pembuatan desain yang responsif, interaktif, serta integrasi front-end dengan back-end agar aplikasi dapat berjalan secara optimal.",
        foto: "<?= $base ?>/public/img/bio/winda.png"
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
