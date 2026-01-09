<?php
/**
 * Asumsi dari controller:
 * ----------------------------------
 * $list : array daftar berkas siswa
 * $base : base url
 *
 * Field minimal per item $row:
 * - id_berkas
 * - nama_lengkap
 * - jenis_berkas
 * - file_berkas
 * - tanggal_upload
 * - status_berkas (menunggu | valid | ditolak)
 */
?>

<h2>Verifikasi Berkas PPDB</h2>

<div class="pengaturan-wrapper">
<table class="pengaturan-table">

<thead>
<tr>
    <th>Nama Siswa</th>
    <th>Jenis Berkas</th>
    <th>Tanggal Upload</th>
    <th>Berkas</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php if (!empty($list)): ?>
<?php foreach ($list as $row): ?>
<tr>

    <!-- Nama -->
    <td><?= htmlspecialchars($row['nama_lengkap'] ?? '-') ?></td>

    <!-- Jenis Berkas -->
    <td><?= htmlspecialchars(ucfirst(str_replace('_',' ', $row['jenis_berkas'] ?? '-'))) ?></td>

    <!-- Tanggal -->
    <td>
        <?= !empty($row['tanggal_upload'])
            ? date('d-m-Y', strtotime($row['tanggal_upload']))
            : '-' ?>
    </td>

    <!-- File -->
    <td>
        <?php if (!empty($row['file_berkas'])): ?>
            <a href="<?= $base ?>/uploads/berkas/<?= $row['file_berkas'] ?>"
               target="_blank">
                Lihat
            </a>
        <?php else: ?>
            -
        <?php endif; ?>
    </td>

    <!-- Status -->
    <td>
        <?php if ($row['status_berkas'] === 'valid'): ?>
            <span style="color:green;font-weight:bold;">✔ Valid</span>

        <?php elseif ($row['status_berkas'] === 'ditolak'): ?>
            <span style="color:red;font-weight:bold;">✖ Ditolak</span>

        <?php else: ?>
            <span style="color:orange;font-weight:bold;">⏳ Menunggu</span>
        <?php endif; ?>
    </td>

    <!-- Aksi -->
    <td style="text-align:center;">
    <?php if ($row['status_berkas'] === 'menunggu'): ?>

        <a href="<?= $base ?>/dashboard/verifikasi_berkas?aksi=valid&id=<?= $row['id_berkas'] ?>"
           onclick="return confirm('Yakin berkas ini VALID?')"
           style="color:green;font-weight:bold;">
           ✔ Valid
        </a>

        |

        <a href="<?= $base ?>/dashboard/verifikasi_berkas?aksi=tolak&id=<?= $row['id_berkas'] ?>"
           onclick="return confirm('Yakin berkas ini DITOLAK?')"
           style="color:red;font-weight:bold;">
           ✖ Tolak
        </a>

    <?php else: ?>
        -
    <?php endif; ?>
    </td>

</tr>
<?php endforeach; ?>

<?php else: ?>
<tr>
    <td colspan="6" style="text-align:center;">
        Belum ada data berkas
    </td>
</tr>
<?php endif; ?>
</tbody>

</table>
</div>
