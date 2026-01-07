<h2>Verifikasi Administrasi PPDB</h2>

<div class="pengaturan-wrapper">

<table class="pengaturan-table">
    <thead>
        <tr>
            <th>Nama Siswa</th>
            <th>Jumlah</th>
            <th>Tanggal Bayar</th>
            <th>Jenis Pembayaran</th>
            <th>Bukti Pembayaran</th>
            <th>Status</th>
            <th>Aksi Verifikasi</th>
        </tr>
    </thead>

    <tbody>
    <?php if(!empty($list)): ?>
        <?php foreach($list as $row): ?>
        <tr>

            <!-- NAMA -->
            <td><?= htmlspecialchars($row["nama_lengkap"] ?? "-") ?></td>

            <!-- JUMLAH -->
            <td>Rp <?= number_format($row["jumlah"], 0, ",", ".") ?></td>

            <!-- TANGGAL -->
            <td><?= date("d-m-Y", strtotime($row["tanggal_bayar"])) ?></td>

            <!-- JENIS PEMBAYARAN -->
            <td>Infaq PPDB</td>

            <!-- BUKTI -->
            <td>
                <?php if(!empty($row["bukti_transfer"])): ?>
                    <a href="<?= $base ?>/uploads/<?= $row["bukti_transfer"] ?>" target="_blank">
                        Lihat
                    </a>
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>

            <!-- STATUS -->
            <td>
                <?php if($row["status_bayar"] === "lunas"): ?>
                    <span style="color:green;font-weight:bold;">✔ Lunas</span>
                <?php elseif($row["status_bayar"] === "ditolak"): ?>
                    <span style="color:red;font-weight:bold;">✖ Ditolak</span>
                <?php else: ?>
                    <span style="color:orange;font-weight:bold;">⏳ Menunggu</span>
                <?php endif; ?>
            </td>

            <!-- AKSI VERIFIKASI -->
            <td style="text-align:center;">
                <?php if($row["status_bayar"] === "menunggu"): ?>

                    <a href="<?= $base ?>/dashboard/verifikasi-bayar/lunas/<?= $row["id_pembayaran"] ?>"
                       style="color:green;font-weight:bold;"
                       onclick="return confirm('Yakin pembayaran ini dinyatakan LUNAS?')">
                       ✔ Valid
                    </a>
                    &nbsp;|&nbsp;
                    <a href="<?= $base ?>/dashboard/verifikasi-bayar/tolak/<?= $row["id_pembayaran"] ?>"
                       style="color:red;font-weight:bold;"
                       onclick="return confirm('Yakin pembayaran ini DITOLAK?')">
                       ✖ Tolak
                    </a>

                <?php elseif($row["status_bayar"] === "lunas"): ?>

                    <span style="color:green;font-weight:bold;">Terverifikasi</span>

                <?php else: ?>

                    <span style="color:#999;">—</span>

                <?php endif; ?>
            </td>

        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7" style="text-align:center;">
                Belum ada data pembayaran
            </td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

</div>
