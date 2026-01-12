<?php $active = "bayar"; ?>

<div class="wrapper">

    <h3 class="fw-bold mb-4 d-flex align-items-center">
        <i class="bi bi-cash-coin me-2 text-primary"></i>
        Pembayaran Infaq Yayasan
    </h3>

    <!-- INFO PEMBAYARAN -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0">Ringkasan Pembayaran</h5>
                <span class="badge bg-<?= $status == "lunas" ? "success" : "warning" ?> px-3 py-2">
                    <?= strtoupper($status) ?>
                </span>
            </div>

            <div class="row text-center">
                <div class="col-md-4 mb-3">
                    <div class="p-3 bg-light rounded">
                        <small class="text-muted">Total Infaq</small>
                        <h6 class="fw-bold mt-1">Rp 500.000</h6>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="p-3 bg-light rounded">
                        <small class="text-muted">Sudah Dibayar</small>
                        <h6 class="fw-bold mt-1">
                            Rp <?= number_format($totalBayar) ?>
                        </h6>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="p-3 bg-light rounded">
                        <small class="text-muted">Sisa Pembayaran</small>
                        <h6 class="fw-bold mt-1 text-danger">
                            Rp <?= number_format(max($sisa, 0)) ?>
                        </h6>
                    </div>
                </div>
            </div>

            <hr>

            <!-- REKENING -->
            <div class="bg-soft-primary p-3 rounded">
                <h6 class="fw-bold mb-2">
                    <i class="bi bi-bank me-1"></i> Rekening Pembayaran
                </h6>
                <table class="table table-sm mb-0">
                    <tr>
                        <td width="30%">Bank</td>
                        <td>: BRI</td>
                    </tr>
                    <tr>
                        <td>No. Rekening</td>
                        <td>: <b>1234-01-000567-53-1</b></td>
                    </tr>
                    <tr>
                        <td>Atas Nama</td>
                        <td>: <b>SMP PGRI Arjasari</b></td>
                    </tr>
                </table>
            </div>

        </div>
    </div>

    <!-- FORM PEMBAYARAN -->
    <?php if ($status != "lunas"): ?>
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Upload Pembayaran</h5>

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
                    <i class="bi bi-upload me-1"></i> Kirim Pembayaran
                </button>

            </form>
        </div>
    </div>
    <?php endif; ?>

    <!-- RIWAYAT PEMBAYARAN -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Riwayat Pembayaran</h5>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Bukti</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($riwayat)): ?>
                            <?php foreach ($riwayat as $r): ?>
                            <tr>
                                <td><?= $r["tanggal_bayar"] ?></td>
                                <td>Rp <?= number_format($r["jumlah"]) ?></td>
                                <td>
                                    <a href="<?= $r["bukti_transfer"] ?>" target="_blank"
                                       class="btn btn-sm btn-outline-primary">
                                        Lihat Bukti
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">
                                    Belum ada pembayaran
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
