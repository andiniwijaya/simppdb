<h2 class="page-title">Data PPDB</h2>

<table class="pengaturan-table">
    <thead>
        <tr>
            <th>Nama Lengkap</th>
            <th>NISN</th>
            <th>Asal Sekolah</th>
            <th>Status Data</th>
            <th>Tanggal Daftar</th>
            <th class="text-center action-col">Action</th>
        </tr>
    </thead>

    <tbody>
    <?php if (!empty($list)): ?>
        <?php foreach ($list as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row["nama_lengkap"]) ?></td>
            <td><?= htmlspecialchars($row["nisn"]) ?></td>
            <td><?= htmlspecialchars($row["asal_sekolah"]) ?></td>

            <!-- STATUS -->
            <td>
                <span class="status-badge <?= $row["status_data"] ?>">
                    <?= strtoupper($row["status_data"]) ?>
                </span>
            </td>

            <td><?= date("Y-m-d H:i", strtotime($row["tanggal_daftar"])) ?></td>

            <!-- ACTION -->
            <td class="action-cell">

                <a href="/admin/ppdb/detail/<?= $row['id_pendaftar'] ?>"
                   class="btn-action btn-detail">
                    Detail
                </a>

                <a href="/admin/ppdb/edit/<?= $row['id_pendaftar'] ?>"
                   class="btn-action btn-edit">
                    Edit
                </a>

                <a href="/admin/ppdb/delete/<?= $row['id_pendaftar'] ?>"
                   class="btn-action btn-delete"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                    Hapus
                </a>

            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6" class="empty-row">
                Belum ada data pendaftar
            </td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
