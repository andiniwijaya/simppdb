<h2>Data PPDB</h2>

<a href="/admin/ppdb/cetak"
   class="btn btn-success mb-3 btn-export-excel">
    <i class="bi bi-file-earmark-excel"></i> Export Excel
</a>

<div class="pengaturan-wrapper">

<table class="pengaturan-table table-ppdb">
    <tr>
        <th>Nama Lengkap</th>
        <th>NISN</th>
        <th>Asal Sekolah</th>
        <th>Status Data</th>
        <th>Tanggal Daftar</th>
        <th>Action</th>
    </tr>

    <?php if (!empty($list)): ?>
        <?php foreach($list as $row): ?>
        <tr data-id="<?= $row['id_pendaftar'] ?>">

            <td class="ppdb-nama">
                <?= htmlspecialchars($row["nama_lengkap"]) ?>
            </td>

            <td class="ppdb-nisn">
                <?= htmlspecialchars($row["nisn"]) ?>
            </td>

            <td class="ppdb-sekolah">
                <?= htmlspecialchars($row["asal_sekolah"]) ?>
            </td>

            <td class="ppdb-status">
                <?= htmlspecialchars($row["status_data"]) ?>
            </td>

            <td class="ppdb-tanggal">
                <?= date("d-m-Y", strtotime($row["tanggal_daftar"])) ?>
            </td>

            <td class="ppdb-action">

                <!-- DETAIL -->
                <a href="/admin/ppdb/detail/<?= $row['id_pendaftar'] ?>"
                   class="btn btn-sm btn-info btn-detail-ppdb">
                    Detail
                </a>

                <!-- EDIT -->
                <a href="/admin/ppdb/edit/<?= $row['id_pendaftar'] ?>"
                   class="btn btn-sm btn-warning btn-edit-ppdb">
                    Edit
                </a>

                <!-- DELETE -->
                <a href="/admin/ppdb/delete/<?= $row['id_pendaftar'] ?>"
                   class="btn btn-sm btn-danger btn-delete-ppdb"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                    Hapus
                </a>

            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6" class="text-center">
                Belum ada data pendaftar
            </td>
        </tr>
    <?php endif; ?>
</table>

</div>


</div>
