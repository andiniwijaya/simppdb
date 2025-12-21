<h2>Data PPDB</h2>

<table class="pengaturan-table">
    <tr>
        <th>Nama Lengkap</th>
        <th>NISN</th>
        <th>Asal Sekolah</th>
        <th>Status Data</th>
        <th>Tanggal Daftar</th>
        <th>Action</th>
        
    </tr>

    <?php foreach($list as $row): ?>
    <tr>
        <td><?= $row["nama_lengkap"] ?></td>
        <td><?= $row["nisn"] ?></td>
        <td><?= $row["asal_sekolah"] ?></td>
        <td><?= $row["status_data"] ?></td>
        <td><?= $row["tanggal_daftar"] ?></td>
    </tr>
    <?php endforeach; ?>

</table>
