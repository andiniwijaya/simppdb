<?php $active = "bayar"; ?>

<div class="wrapper">

    <h3 class="fw-bold mb-4">Pembayaran Infaq Yayasan</h3>

    <!-- INFO PEMBAYARAN -->
    <div class="card p-4 mb-4">
        <p><b>Total Infaq:</b> Rp 500.000</p>
        <p><b>Sudah Dibayar:</b> Rp <?= number_format($totalBayar) ?></p>
        <p><b>Sisa:</b> Rp <?= number_format(max($sisa, 0)) ?></p>

        <span class="badge bg-<?= $status == "lunas" ? "success" : "warning" ?>">
            <?= strtoupper($status) ?>
        </span>
    </div>

    <!-- FORM PEMBAYARAN -->
    <?php if ($status != "lunas"): ?>
    <div class="card p-4 mb-4">
        <form action="/siswa/pembayaran/upload" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Nominal Bayar</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Bukti Transfer</label>
                <input type="file" name="bukti" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">
                Kirim Pembayaran
            </button>

        </form>
    </div>
    <?php endif; ?>

    <!-- RIWAYAT PEMBAYARAN -->
    <h5 class="fw-bold mt-4 mb-3">Riwayat Pembayaran</h5>

    <table class="table table-bordered bg-white">
        <thead class="table-light">
            <tr>
                <th width="30%">Tanggal</th>
                <th width="30%">Jumlah</th>
                <th width="40%">Bukti</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($riwayat)): ?>
                <?php foreach ($riwayat as $r): ?>
                <tr>
                    <td><?= $r["tanggal_bayar"] ?></td>
                    <td>Rp <?= number_format($r["jumlah"]) ?></td>
                    <td>
                        <a href="<?= $r["bukti_transfer"] ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                            Lihat Bukti
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center text-muted">
                        Belum ada pembayaran
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>
