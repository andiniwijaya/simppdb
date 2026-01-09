<h3>Verifikasi Berkas Pendaftar</h3>

<table class="table table-bordered">
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

    <!-- NAMA -->
    <td><?= htmlspecialchars($row['nama_lengkap'] ?? '-') ?></td>

    <!-- JENIS -->
    <td><?= ucwords(str_replace('_', ' ', $row['jenis_berkas'])) ?></td>

    <!-- FILE -->
    <td>
        <a href="/public/uploads/berkas/<?= htmlspecialchars($row['lokasi_berkas']) ?>" target="_blank">
            Lihat Berkas
        </a>
    </td>

    <!-- STATUS -->
    <td>
        <?php
            $status = $row['status_berkas'] ?? 'menunggu';

            if ($status === 'valid') {
                echo '<span style="color:green;font-weight:bold;">VALID</span>';
            } elseif ($status === 'invalid') {
                echo '<span style="color:red;font-weight:bold;">INVALID</span>';
            } else {
                echo '<span style="color:orange;font-weight:bold;">MENUNGGU</span>';
            }
        ?>
    </td>

    <!-- AKSI -->
    <td>
        <?php if (($row['status_berkas'] ?? '') === 'menunggu'): ?>
            <a href="/dashboard/validBerkas?id=<?= $row['id_berkas'] ?>"
               onclick="return confirm('Validkan berkas ini?')">
               ✔ Valid
            </a>
            |
            <a href="/dashboard/invalidBerkas?id=<?= $row['id_berkas'] ?>"
               onclick="return confirm('Tolak berkas ini?')">
               ✖ Invalid
            </a>
        <?php else: ?>
            -
        <?php endif; ?>
    </td>

</tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
    <td colspan="5" style="text-align:center">Belum ada berkas</td>
</tr>
<?php endif; ?>
</tbody>
</table>
