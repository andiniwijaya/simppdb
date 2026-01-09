<h2>Verifikasi Berkas PPDB</h2>

<div class="pengaturan-wrapper">
<table class="pengaturan-table">
    <tr>
        <th>Nama Siswa</th>
        <th>Jenis Berkas</th>
        <th>File</th>
        <th>Tanggal Upload</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php if (!empty($list)): ?>
        <?php foreach ($list as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>

            <td><?= htmlspecialchars($row['jenis_berkas']) ?></td>

            <td>
                <a href="/uploads/berkas/<?= $row['nama_file'] ?>" target="_blank">
                    Lihat
                </a>
            </td>

            <td><?= date('d-m-Y', strtotime($row['tanggal_upload'])) ?></td>

            <td>
                <?php if ($row['status'] === 'valid'): ?>
                    <span style="color:green">✔ Valid</span>
                <?php elseif ($row['status'] === 'invalid'): ?>
                    <span style="color:red">✖ Ditolak</span>
                <?php else: ?>
                    <span style="color:orange">Menunggu</span>
                <?php endif; ?>
            </td>

            <td>
                <a href="/dashboard/validBerkas?id=<?= $row['id_berkas'] ?>"
                   class="btn btn-sm btn-success">
                    Valid
                </a>

                <a href="/dashboard/invalidBerkas?id=<?= $row['id_berkas'] ?>"
                   class="btn btn-sm btn-danger">
                    Tolak
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6" class="text-center">
                Belum ada berkas diupload
            </td>
        </tr>
    <?php endif; ?>
</table>
</div>
