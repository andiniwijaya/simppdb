<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Data_PPDB_LENGKAP.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1">
    <tr style="background:#eee;font-weight:bold;">
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>NISN</th>
        <th>Asal Sekolah</th>
        <th>Status</th>
        <th>Tgl Daftar</th>

        <th>Nama Ayah</th>
        <th>No HP Ayah</th>
        <th>Nama Ibu</th>
        <th>No HP Ibu</th>

        <th>Nama Wali</th>
        <th>No HP Wali</th>
    </tr>

    <?php $no=1; foreach($list as $row): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama_lengkap'] ?></td>
        <td><?= $row['nisn'] ?></td>
        <td><?= $row['asal_sekolah'] ?></td>
        <td><?= $row['status_data'] ?></td>
        <td><?= date('d-m-Y', strtotime($row['tanggal_daftar'])) ?></td>

        <td><?= $row['nama_ayah'] ?></td>
        <td><?= $row['hp_ayah'] ?></td>
        <td><?= $row['nama_ibu'] ?></td>
        <td><?= $row['hp_ibu'] ?></td>

        <td><?= $row['nama_wali'] ?? '-' ?></td>
        <td><?= $row['hp_wali'] ?? '-' ?></td>
    </tr>
    <?php endforeach; ?>
</table>
