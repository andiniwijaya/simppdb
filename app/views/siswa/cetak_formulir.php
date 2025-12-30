<?php
$base = Config::base_url();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Formulir PPDB</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?= $base ?>/public/assets/css/cetak-formulir.css">
</head>

<body>

<button id="btnCetak" class="btn-cetak">🖨 Cetak</button>

<h3>FORMULIR PENDAFTARAN PESERTA DIDIK BARU</h3>
<h4>SMP PGRI ARJASARI</h4>

<hr>

<h4>DATA SISWA</h4>
<table class="border">
<tr><td class="label">NISN</td><td><?= $data["siswa"]["nisn"] ?></td></tr>
<tr><td class="label">Nama Lengkap</td><td><?= $data["siswa"]["nama_lengkap"] ?></td></tr>
<tr>
    <td class="label">Tempat, Tanggal Lahir</td>
    <td><?= $data["siswa"]["tempat_lahir"] ?>, <?= $data["siswa"]["tanggal_lahir"] ?></td>
</tr>
<tr><td class="label">Jenis Kelamin</td><td><?= $data["siswa"]["jenis_kelamin"] ?></td></tr>
<tr><td class="label">Agama</td><td><?= $data["siswa"]["agama"] ?></td></tr>
<tr><td class="label">Alamat</td><td><?= $data["siswa"]["alamat"] ?></td></tr>
</table>

<h4>DATA ORANG TUA</h4>
<table class="border">
<tr><td class="label">Nama Ayah</td><td><?= $data["ortu"]["nama_ayah"] ?></td></tr>
<tr><td class="label">Pekerjaan Ayah</td><td><?= $data["ortu"]["pekerjaan_ayah"] ?></td></tr>
<tr><td class="label">Nama Ibu</td><td><?= $data["ortu"]["nama_ibu"] ?></td></tr>
<tr><td class="label">Pekerjaan Ibu</td><td><?= $data["ortu"]["pekerjaan_ibu"] ?></td></tr>
<tr><td class="label">Alamat Orang Tua</td><td><?= $data["ortu"]["alamat_rumah_ayah"] ?></td></tr>
</table>

<h4>DATA WALI</h4>
<table class="border">
<tr><td class="label">Nama Wali</td><td><?= $data["wali"]["nama_wali"] ?? "-" ?></td></tr>
<tr><td class="label">Pekerjaan</td><td><?= $data["wali"]["pekerjaan_wali"] ?? "-" ?></td></tr>
<tr><td class="label">No HP</td><td><?= $data["wali"]["hp_wali"] ?? "-" ?></td></tr>
</table>

<table width="100%" class="ttd">
<tr>
<td width="60%"></td>
<td align="center">
    Arjasari, <?= date('d-m-Y') ?><br>
    Orang Tua / Wali
    <br><br><br>
    ( _____________________ )
</td>
</tr>
</table>

<!-- JS -->
<script src="<?= $base ?>/public/assets/js/cetak-formulir.js"></script>

</body>
</html>
