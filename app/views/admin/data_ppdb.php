<h2>Data PPDB</h2>
<a href="/admin/ppdb/cetak" 
   target="_blank"
   class="btn btn-success mb-3">
   <i class="bi bi-file-earmark-excel"></i> Cetak Data (Excel)
</a>


<div class="pengaturan-wrapper">

<table class="pengaturan-table">
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
        <tr>
            <td><?= htmlspecialchars($row["nama_lengkap"]) ?></td>
            <td><?= htmlspecialchars($row["nisn"]) ?></td>
            <td><?= htmlspecialchars($row["asal_sekolah"]) ?></td>
            <td><?= htmlspecialchars($row["status_data"]) ?></td>
            <td><?= date("d-m-Y", strtotime($row["tanggal_daftar"])) ?></td>
            <td>

                <!-- DETAIL -->
                <a href="/admin/ppdb/detail/<?= $row['id_pendaftar'] ?>"
                   class="btn btn-sm btn-info">
                    Detail
                </a>

                <!-- EDIT -->
                <a href="/admin/ppdb/edit/<?= $row['id_pendaftar'] ?>"
                   class="btn btn-sm btn-warning">
                    Edit
                </a>
               

                <!-- DELETE -->
                <a href="/admin/ppdb/delete/<?= $row['id_pendaftar'] ?>"
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                    Hapus
                </a>

            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6" style="text-align:center;">
                Belum ada data pendaftar
            </td>
        </tr>
    <?php endif; ?>
</table>

</div>
