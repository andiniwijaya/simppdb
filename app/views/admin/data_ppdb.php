<?php
// Helper escape agar aman dari NULL & XSS (PHP 8.1+)
function esc($value)
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}
?>

<h2>Data PPDB</h2>

<a href="/admin/ppdb/cetak"
   class="btn btn-success mb-3 btn-export-excel">
    <i class="bi bi-file-earmark-excel"></i> Export Excel
</a>

<div class="pengaturan-wrapper">

    <table class="pengaturan-table table-ppdb">
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>NISN</th>
                <th>Asal Sekolah</th>
                <th>Status Data</th>
                <th>Tanggal Daftar</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php if (!empty($list)): ?>
            <?php foreach ($list as $row): ?>
                <tr data-id="<?= esc($row['id_pendaftar'] ?? '') ?>">

                    <td class="ppdb-nama">
                        <?= esc($row['nama_lengkap'] ?? '') ?>
                    </td>

                    <td class="ppdb-nisn">
                        <?= esc($row['nisn'] ?? '') ?>
                    </td>

                    <td class="ppdb-sekolah">
                        <?= esc($row['asal_sekolah'] ?? '') ?>
                    </td>

                    <td class="ppdb-status">
                        <?= esc($row['status_data'] ?? '') ?>
                    </td>

                    <td class="ppdb-tanggal">
                        <?php if (!empty($row['tanggal_daftar'])): ?>
                            <?= date('d-m-Y', strtotime($row['tanggal_daftar'])) ?>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>

                    <td class="ppdb-action">
                        <a href="/admin/ppdb/detail?id=<?= esc($row['id_pendaftar'] ?? '') ?>"
                           class="btn btn-sm btn-info">
                            Detail
                        </a>

                        <a href="/admin/ppdb/edit?id=<?= esc($row['id_pendaftar'] ?? '') ?>"
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>

                            <a href="/dashboard/deletePPDB?id=<?= $row['id_pendaftar'] ?>"
                              onclick="return confirm('Yakin ingin menghapus data ini?')">

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
        </tbody>
    </table>

</div>
