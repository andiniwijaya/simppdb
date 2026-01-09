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

            <p id="bio-desc"></p>

            <!-- SOCIAL -->
            <div class="bio-social">
                <a id="bio-ig" target="_blank"><i class="bi bi-instagram"></i></a>
                <a id="bio-github" target="_blank"><i class="bi bi-github"></i></a>
                <a id="bio-linkedin" target="_blank"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>

        <div class="bio-photo">
            <img id="bio-photo" src="<?= $base ?>/public/img/bio/andini.png" alt="Foto">
        </div>

    </section>

</div>

<script>
const dataBio = {
    andini: {
        nama: "Andini Wijayanti",
        reminder: "Project Manager",
        desc: "Saya adalah mahasiswi RPL yang berperan sebagai Project Manager dalam pengembangan sistem informasi. Saya bertanggung jawab mengatur alur kerja tim, menyusun perencanaan proyek, mengoordinasikan tugas, serta memastikan setiap tahapan pengembangan berjalan sesuai target dan kebutuhan pengguna.",
        foto: "<?= $base ?>/public/img/bio/andini.png",
        ig: "https://www.instagram.com/ann.wijay?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==",
        github: "",
        linkedin: ""
    },
    mutiara: {
        nama: "Mutiara Botani",
        reminder: "Programmer",
        desc: "Saya berperan sebagai Programmer yang fokus pada pengembangan fitur aplikasi, penulisan kode program, serta perbaikan bug agar sistem berjalan stabil dan optimal sesuai dengan rancangan yang telah ditentukan.",
        foto: "<?= $base ?>/public/img/bio/mutiara.png",
        ig: "https://instagram.com/mutiara",
        github: "",
        linkedin: ""
    },
    silvia: {
        nama: "Silvia Agustina",
        reminder: "System Analyst",
        desc: "Saya memiliki minat kuat sebagai System Analyst, khususnya dalam analisis kebutuhan sistem, perancangan alur proses bisnis, pemodelan sistem informasi, serta menjembatani kebutuhan pengguna dengan tim pengembang.",
        foto: "<?= $base ?>/public/img/bio/silvia.png",
        ig: "https://www.instagram.com/shakipiya/?utm_source=ig_web_button_share_sheet",
        github: "",
        linkedin: ""
    },
    sundari: {
        nama: "Sundari Rosdiana",
        reminder: "System Documentation",
        desc: "Saya fokus pada dokumentasi sistem, penyusunan laporan, serta pendokumentasian alur kerja aplikasi agar mudah dipahami dan digunakan sebagai referensi pengembangan selanjutnya.",
        foto: "<?= $base ?>/public/img/bio/sundari.png",
        ig: "https://www.instagram.com/dianadariii?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==",
        github: "",
        linkedin: ""
    },
    winda: {
        nama: "Winda Aryanti",
        reminder: "Web Developer",
        desc: "Saya tertarik pada pengembangan aplikasi web, khususnya pada desain antarmuka, pengalaman pengguna, serta pembuatan tampilan yang responsif dan mudah digunakan.",
        foto: "<?= $base ?>/public/img/bio/winda.png",
        ig: "https://www.instagram.com/wnd_arynt/?utm_source=ig_web_button_share_sheet",
        github: "",
        linkedin: ""
    }
};

function showBio(key, el) {
    const d = dataBio[key];

    document.getElementById("bio-name").innerText = d.nama;
    document.getElementById("bio-role").innerText = d.reminder;
    document.getElementById("bio-desc").innerText = d.desc;
    document.getElementById("bio-photo").src = d.foto;

    setLink("bio-ig", d.ig);
    setLink("bio-github", d.github);
    setLink("bio-linkedin", d.linkedin);

    document.querySelectorAll(".bio-nav button")
        .forEach(btn => btn.classList.remove("active"));
    el.classList.add("active");
}

function setLink(id, url) {
    const el = document.getElementById(id);
    if (url) {
        el.href = url;
        el.style.display = "flex";
    } else {
        el.style.display = "none";
    }
}

/* DEFAULT LOAD */
document.addEventListener("DOMContentLoaded", () => {
    showBio("andini", document.querySelector(".bio-nav button"));
});
</script>
