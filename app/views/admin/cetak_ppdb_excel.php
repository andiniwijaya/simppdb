<table border="1">
    <tr style="background:#eee;font-weight:bold;">
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>NISN</th>
        <th>Asal Sekolah</th>
        <th>Status Data</th>
        <th>Tanggal Daftar</th>
    </tr>

    <?php $no=1; foreach($list as $row): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama_lengkap'] ?></td>
        <td><?= $row['nisn'] ?></td>
        <td><?= $row['asal_sekolah'] ?></td>
        <td><?= $row['status_data'] ?></td>
        <td><?= $row['tanggal_daftar'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
