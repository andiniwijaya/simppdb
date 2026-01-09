<h3>Pengumuman Hasil PPDB</h3>

<table class="pengaturan-table">
<thead>
<tr>
    <th>Nama Siswa</th>
    <th>Status</th>
</tr>
</thead>
<tbody>
<?php foreach($list as $row): ?>
<tr>
    <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
    <td>
        <?php if($row['status'] === 'diterima'): ?>
            <span style="color:green;font-weight:bold;">🎉 DITERIMA</span>
        <?php elseif($row['status'] === 'ditolak'): ?>
            <span style="color:red;font-weight:bold;">❌ DITOLAK</span>
        <?php else: ?>
            <span style="color:orange;">⏳ MENUNGGU</span>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
