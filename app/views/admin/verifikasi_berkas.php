<h3>Verifikasi Berkas Siswa</h3>

<table class="table">
<thead>
<tr>
    <th>Nama Siswa</th>
    <th>File</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php if (!empty($list)): ?>
<?php foreach ($list as $row): ?>
<tr>
    <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
    <td>
        <a href="/public/uploads/berkas/<?= $row['nama_file'] ?>" target="_blank">
            Lihat Berkas
        </a>
    </td>
    <td><?= strtoupper($row['status']) ?></td>
    <td>
        <?php if ($row['status'] === 'menunggu'): ?>
            <a href="/dashboard/validBerkas?id=<?= $row['id_berkas'] ?>">✔ Valid</a> |
            <a href="/dashboard/invalidBerkas?id=<?= $row['id_berkas'] ?>">✖ Invalid</a>
        <?php else: ?>
            -
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
    <td colspan="4" style="text-align:center">Belum ada berkas</td>
</tr>
<?php endif; ?>
</tbody>
</table>
