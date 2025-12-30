<?php $base = Config::base_url(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Cetak Data PPDB</title>

<!-- CSS DIPISAH -->
<link rel="stylesheet" href="<?= $base ?>/public/assets/css/cetak_ppdb_excel.css">
</head>

<body>

<h3>DATA PENDAFTAR PPDB</h3>

<table>
<thead>
<tr>
    <th>No</th>
    <th>Nama Lengkap</th>
    <th>NISN</th>
    <th>Asal Sekolah</th>
    <th>Status Data</th>
    <th>Tanggal Daftar</th>
</tr>
</thead>

<tbody>
<?php $no=1; foreach($list as $row): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
    <td><?= htmlspecialchars($row['nisn']) ?></td>
    <td><?= htmlspecialchars($row['asal_sekolah']) ?></td>
    <td><?= htmlspecialchars($row['status_data']) ?></td>
    <td><?= htmlspecialchars($row['tanggal_daftar']) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>


<script src="<?= $base ?>/public/assets/js/cetak_ppdb_excel.js"></script>
</body>
</html>
