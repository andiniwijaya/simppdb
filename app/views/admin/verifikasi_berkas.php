<h2>Verifikasi Berkas Siswa</h2>

<table class="pengaturan-table">
<tr>
    <th>Nama</th>
    <th>Jenis Berkas</th>
    <th>File</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php foreach ($list as $b): ?>
<tr>
    <td><?= htmlspecialchars($b['nama_lengkap']) ?></td>
    <td><?= $b['jenis_berkas'] ?></td>
    <td>
        <a href="<?= $b['lokasi_berkas'] ?>" target="_blank">Lihat</a>
    </td>
    <td><?= $b['status_berkas'] ?></td>
    <td>
        <?php if ($b['status_berkas'] !== 'valid'): ?>
            <a href="/admin/berkas/valid?id=<?= $b['id_berkas'] ?>">✔ Valid</a> |
            <a href="/admin/berkas/invalid?id=<?= $b['id_berkas'] ?>">✖ Invalid</a>
        <?php else: ?>
            ✔ Valid
        <?php endif ?>
    </td>
</tr>
<?php endforeach ?>
</table>
