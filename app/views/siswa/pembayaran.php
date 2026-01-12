<?php $active = "bayar"; ?>

<div class="wrapper">

    <h3 class="fw-bold mb-3">
        <i class="bi bi-cash-coin me-2"></i> Pembayaran Infaq Yayasan
    </h3>

    <!-- INFO PEMBAYARAN -->
    <div class="card p-4 mb-4">
        <p><b>Total Infaq:</b> Rp 500.000</p>
        <p><b>Sudah Dibayar:</b> Rp <?= number_format($totalBayar) ?></p>
        <p><b>Sisa:</b> Rp <?= number_format(max($sisa, 0)) ?></p>

        <span class="badge bg-<?= $status == "lunas" ? "success" : "warning" ?>">
            <?= strtoupper($status) ?>
        </span>
    </div>

    <!-- KIRIM BUKTI PEMBAYARAN -->
    <?php if ($status != "lunas"): ?>
    <div class="card p-4 mb-4">
        <h5 class="fw-bold mb-3">
            <i class="bi bi-upload me-1"></i> Kirim Bukti Pembayaran
        </h5>

        <form action="/siswa/pembayaran/upload" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Nominal Bayar</label>
                <input 
                    type="number" 
                    name="jumlah" 
                    class="form-control" 
                    min="1"
                    max="<?= max($sisa, 0) ?>"
                    required
                >
                <small class="text-muted">
                    Maksimal Rp <?= number_format(max($sisa, 0)) ?>
                </small>
            </div>

            <div class="mb-3">
                <label class="form-label">Kirim Bukti Pembayaran</label>
                <input 
                    type="file" 
                    name="bukti" 
                    class="form-control"
                    accept="image/*,.pdf"
                    required
                >
                <small class="text-muted">
                    Format file: JPG, PNG, atau PDF
                </small>
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
<?php $active = "bayar"; ?>

<div class="wrapper">

    <h3 class="fw-bold mb-4 d-flex align-items-center">
        <i class="bi bi-cash-coin me-2 text-primary"></i>
        Pembayaran Infaq Yayasan
    </h3>

    <!-- INFO PEMBAYARAN -->
    <div class="card shadow-sm p-4 mb-4">
        <div class="row text-center mb-3">
            <div class="col-md-4 mb-2">
                <div class="p-3 bg-light rounded">
                    <small class="text-muted">Total Infaq</small>
                    <h6 class="fw-bold mt-1">Rp 500.000</h6>
                </div>
            </div>

            <div class="col-md-4 mb-2">
                <div class="p-3 bg-light rounded">
                    <small class="text-muted">Sudah Dibayar</small>
                    <h6 class="fw-bold mt-1">
                        Rp <?= number_format($totalBayar) ?>
                    </h6>
                </div>
            </div>

            <div class="col-md-4 mb-2">
                <div class="p-3 bg-light rounded">
                    <small class="text-muted">Sisa Pembayaran</small>
                    <h6 class="fw-bold mt-1 text-danger">
                        Rp <?= number_format(max($sisa, 0)) ?>
                    </h6>
                </div>
            </div>
        </div>

        <div class="text-end">
            <span class="badge bg-<?= $status == "lunas" ? "success" : "warning" ?> px-3 py-2">
                <?= strtoupper($status) ?>
            </span>
        </div>
    </div>

    <!-- INFO REKENING -->
    <div class="card shadow-sm p-4 mb-4 border-start border-4 border-primary">
        <h5 class="fw-bold mb-3">
            <i class="bi bi-bank me-2"></i> Informasi Rekening Pembayaran
        </h5>

        <div class="row">
            <div class="col-md-6 mb-2">
                <small class="text-muted">Nama Bank</small>
                <div class="fw-semibold">BRI</div>
            </div>

            <div class="col-md-6 mb-2">
                <small class="text-muted">Nomor Rekening</small>
                <div class="fw-semibold">1234-01-000567-53-1</div>
            </div>

            <div class="col-md-12 mt-2">
                <small class="text-muted">Atas Nama</small>
                <div class="fw-semibold">SMP PGRI Arjasari</div>
            </div>
        </div>

        <div class="alert alert-light mt-3 mb-0 small">
            Silakan lakukan transfer sesuai nominal, lalu unggah bukti pembayaran di bawah.
        </div>
    </div>

    <!-- KIRIM BUKTI PEMBAYARAN -->
    <?php if ($status != "lunas"): ?>
    <div class="card shadow-sm p-4 mb-4">
        <h5 class="fw-bold mb-3">
            <i class="bi bi-upload me-1"></i> Kirim Bukti Pembayaran
        </h5>

        <form action="/siswa/pembayaran/upload" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Nominal Bayar</label>
                <input 
                    type="number" 
                    name="jumlah" 
                    class="form-control" 
                    min="1"
                    max="<?= max($sisa, 0) ?>"
                    required
                >
                <small class="text-muted">
                    Maksimal Rp <?= number_format(max($sisa, 0)) ?>
                </small>
            </div>

            <div class="mb-3">
                <label class="form-label">Unggah Bukti Pembayaran</label>
                <input 
                    type="file" 
                    name="bukti" 
                    class="form-control"
                    accept="image/*,.pdf"
                    required
                >
                <small class="text-muted">
                    Format JPG, PNG, atau PDF
                </small>
            </div>

            <button class="btn btn-primary w-100">
                Kirim Pembayaran
            </button>

        </form>
    </div>
    <?php endif; ?>

    <!-- RIWAYAT PEMBAYARAN -->
    <div class="card shadow-sm p-4">
        <h5 class="fw-bold mb-3">Riwayat Pembayaran</h5>

        <div class="table-responsive">
            <table class="table table-bordered bg-white align-middle">
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
                                <a href="<?= $r["bukti_transfer"] ?>" target="_blank"
                                   class="btn btn-sm btn-outline-primary">
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
    </div>

</div>
