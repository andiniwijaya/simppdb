<?php
$base = Config::base_url();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Cetak Data PPDB</title>

<!-- CSS CETAK -->
<link rel="stylesheet" href="<?= $base ?>/public/assets/css/cetak_ppdb.css">
</head>

<body>

<button id="btnCetak">🖨 Cetak</button>

<h2>DATA PENDAFTAR PPDB</h2>

<table class="cetak-table">
    <tr>
        <th>Nama Lengkap</th>
        <td><?= htmlspecialchars($data["nama_lengkap"]) ?></td>
    </tr>
    <tr>
        <th>NISN</th>
        <td><?= htmlspecialchars($data["nisn"]) ?></td>
    </tr>
    <tr>
        <th>Asal Sekolah</th>
        <td><?= htmlspecialchars($data["asal_sekolah"]) ?></td>
    </tr>
    <tr>
        <th>Status Data</th>
        <td><?= htmlspecialchars($data["status_data"]) ?></td>
    </tr>
    <tr>
        <th>Tanggal Daftar</th>
        <td><?= date("d-m-Y", strtotime($data["tanggal_daftar"])) ?></td>
    </tr>
</table>

<!-- JS CETAK -->
<script src="<?= $base ?>/public/assets/js/cetak_ppdb.js"></script>

</body>
</html>
