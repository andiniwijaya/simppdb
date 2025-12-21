<h2>Verifikasi Administrasi PPDB</h2>

<div class="pengaturan-wrapper">

<table class="pengaturan-table">

<tr>
    <th>Nama Siswa</th>
    <th>Jumlah</th>
    <th>Tanggal</th>
    <th>Jenis Pembyaran</th>
    <th>Bukti Pembayaran</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php foreach($list as $row): ?>

<tr>
    <td><?= $row["nama_lengkap"] ?></td>
    <td>Rp <?= number_format($row["jumlah"]) ?></td>
    <td><?= $row["tanggal"] ?></td>

    <td>
        <a href="<?= $base ?>/public/bukti/<?= $row["bukti"] ?>" target="_blank">Lihat</a>
    </td>

    <td>
        <?php if($row["status_bayar"] == "lunas"): ?>
            <span style="color:green;font-weight:bold;">Lunas</span>
        <?php elseif($row["status_bayar"] == "ditolak"): ?>
            <span style="color:red;font-weight:bold;">Ditolak</span>
        <?php else: ?>
            <span style="color:orange;font-weight:bold;">Menunggu</span>
        <?php endif; ?>
    </td>

    <td>
        <?php if($row["status_bayar"] != "lunas"): ?>

            <a href="<?= $base ?>/administrasi/valid/<?= $row["id_payment"] ?>" 
               style="color:green;font-weight:bold;">Valid</a>

            |

            <a href="<?= $base ?>/administrasi/tolak/<?= $row["id_payment"] ?>" 
               style="color:red;font-weight:bold;">Tolak</a>

        <?php else: ?>

            ✔

        <?php endif; ?>
    </td>

</tr>

<?php endforeach; ?>

</table>
</div>
