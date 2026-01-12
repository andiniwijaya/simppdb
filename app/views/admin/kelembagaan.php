<?php $base = Config::base_url(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profil Lembaga | SIM Sekolah</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- BOOTSTRAP ICON -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS PROJECT -->
    <link rel="stylesheet" href="<?= $base ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/public/assets/css/kelembagaan.css">

    <!-- GLOBAL STYLE SENTUHAN ESTETIK -->
    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background:#eef2f7;
        }

        h2{
            letter-spacing:.3px;
        }
    </style>
</head>
<body>

<h2 style="margin-bottom:20px; font-weight:700;">Profil Lembaga</h2>

<div class="kelembagaan-wrapper">

    <!-- NAV TAB -->
    <ul class="kelembagaan-nav">
        <li class="active" data-target="profil">Profil</li>
        <li data-target="alamat">Alamat Lembaga</li>
        <li data-target="kontak">Contact</li>
        <li data-target="kepsek">Data Kepala</li>
        <li data-target="data_lain">Data Tambahan</li>
        <li data-target="visi_misi">Visi & Misi</li>
        <li data-target="legalitas">Legalitas Sekolah</li>
    </ul>

    <!-- CONTENT WRAPPER -->
    <div class="kelembagaan-content">

        <!-- PROFIL -->
        <div class="kelembagaan-page show" id="profil">
            <table class="form-table">
                <tr><th>NPSN</th><td>573682120009</td></tr>
                <tr><th>NSS</th><td>234151274</td></tr>
                <tr><th>Nama Sekolah</th><td>SMP PGRI Arjasari</td></tr>
                <tr><th>Jenjang Sekolah</th><td>SMP/MTS</td></tr>
                <tr><th>Status Sekolah</th><td>Swasta</td></tr>
                <tr><th>Akreditasi</th><td>B</td></tr>
                <tr><th>Tahun Berdiri</th><td>1989</td></tr>
                <tr><th>Luas Tanah</th><td>2.500 m²</td></tr>
                <tr><th>Jumlah Guru</th><td>25 Orang</td></tr>
                <tr><th>Jumlah Siswa</th><td>380 Orang</td></tr>
            </table>
        </div>

        <!-- ALAMAT -->
        <div class="kelembagaan-page" id="alamat">

            <table class="form-table">
                <tr><th>Alamat</th><td>Jl. Raya Arjasari No.10</td></tr>
                <tr><th>RT / RW</th><td>05 / 08</td></tr>
                <tr><th>Desa</th><td>Arjasari</td></tr>
                <tr><th>Kecamatan</th><td>Arjasari</td></tr>
                <tr><th>Kabupaten</th><td>Bandung</td></tr>
                <tr><th>Provinsi</th><td>Jawa Barat</td></tr>
                <tr><th>Kode Pos</th><td>40379</td></tr>
            </table>

        </div>

        <!-- KONTAK -->
        <div class="kelembagaan-page" id="kontak">

            <table class="form-table">
                <tr><th>Telepon</th><td>08123456789</td></tr>
                <tr><th>Email</th><td>smp.prgi.arjasari@gmail.com</td></tr>
                <tr><th>Website</th><td>smpgriarjasari.sch.id</td></tr>
                <tr><th>Instagram</th><td>@smp_pgri_arjasari</td></tr>
                <tr><th>Facebook</th><td>SMP PGRI Arjasari</td></tr>
            </table>

        </div>

        <!-- KEPSEK -->
        <div class="kelembagaan-page" id="kepsek">

            <table class="form-table">
                <tr><th>Nama Kepala Sekolah</th><td>Bapak Ahmad Firmansyah, S.Pd</td></tr>
                <tr><th>Periode</th><td>2023 - Sekarang</td></tr>
                <tr><th>Pendidikan Kepala Sekolah</th><td>S2 Pendidikan</td></tr>
                <tr><th>Prestasi</th><td>Guru Berprestasi Kab. Bandung 2020</td></tr>
            </table>

        </div>

        <!-- DATA TAMBAHAN -->
        <div class="kelembagaan-page" id="data_lain">

            <table class="form-table">
                <tr><th>Ekstrakurikuler</th><td>Pramuka, Paskibra, PMR, Futsal, Voli</td></tr>
                <tr><th>Bahasa Pengantar</th><td>Bahasa Indonesia</td></tr>
                <tr><th>Jam Belajar</th><td>Senin – Jumat 07.00 - 14.00</td></tr>
                <tr><th>Akses Transportasi</th><td>Mudah</td></tr>
            </table>

        </div>

        <!-- VISI MISI -->
        <div class="kelembagaan-page" id="visi_misi">

            <table class="form-table">
                <tr>
                    <th>Visi</th>
                    <td>
                        Mewujudkan siswa bertakwa, berprestasi, berkarakter, dan berdaya saing global.
                    </td>
                </tr>

                <tr>
                    <th>Misi</th>
                    <td>
                        - Menyelenggarakan pembelajaran aktif dan kreatif <br>
                        - Meningkatkan prestasi akademik dan non akademik <br>
                        - Mengembangkan potensi siswa secara menyeluruh
                    </td>
                </tr>
            </table>

        </div>

        <!-- LEGALITAS -->
        <div class="kelembagaan-page" id="legalitas">

            <table class="form-table">
                <tr><th>NPSN</th><td>573682120009</td></tr>
                <tr><th>Nomor Izin Operasional</th><td>421.3/4828-DISDIK</td></tr>
                <tr><th>Tahun Izin</th><td>1990</td></tr>
                <tr><th>Kurikulum</th><td>Kurikulum Merdeka</td></tr>
            </table>

        </div>

    </div>

</div>

<script src="<?= $base ?>/public/assets/js/kelembagaan.js"></script>
