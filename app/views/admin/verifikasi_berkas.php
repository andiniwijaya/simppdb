<h3 class="page-title">Verifikasi Berkas Pendaftar</h3>

<div class="card-wrapper">
<table class="ppdb-table">
<thead>
<tr>
    <th>Nama Siswa</th>
    <th>Jenis Berkas</th>
    <th>Berkas</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php if (!empty($list)): ?>
<?php foreach ($list as $row): ?>
<tr>

<td><?= htmlspecialchars($row['nama_lengkap']) ?></td>

<td><?= ucwords(str_replace('_',' ', $row['jenis_berkas'])) ?></td>

<td>
    <a href="/public/uploads/berkas/<?= $row['lokasi_berkas'] ?>" 
       target="_blank" 
       class="link-view">
       Lihat Berkas
    </a>
</td>

<td>
<?php
$status = $row['status_berkas'];
if ($status === 'valid') {
    echo '<span class="badge badge-success">VALID</span>';
} elseif ($status === 'invalid') {
    echo '<span class="badge badge-danger">INVALID</span>';
} else {
    echo '<span class="badge badge-warning">MENUNGGU</span>';
}
?>
</td>

<td>
<?php if ($status === 'menunggu'): ?>
    <a href="/dashboard/validBerkas?id=<?= $row['id_berkas'] ?>" 
       class="btn btn-success"
       onclick="return confirm('Validkan berkas ini?')">
       ✓ Valid
    </a>

    <a href="/dashboard/invalidBerkas?id=<?= $row['id_berkas'] ?>" 
       class="btn btn-danger"
       onclick="return confirm('Tolak berkas ini?')">
       ✕ Invalid
    </a>
<?php else: ?>
    <span class="text-muted">-</span>
<?php endif; ?>
</td>

</tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
    <td colspan="5" class="empty">Belum ada berkas</td>
</tr>
<?php endif; ?>
</tbody>
</table>
</div>
