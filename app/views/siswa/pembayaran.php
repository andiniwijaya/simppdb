<?php $active="bayar"; ?>

<h3 class="fw-bold mb-4 text-center">Pembayaran Infaq Yayasan</h3>

<div class="card p-4 mb-4">
    <p><b>Total Infaq:</b> Rp 500.000</p>
    <p><b>Sudah Dibayar:</b> Rp <?= number_format($totalBayar) ?></p>
    <p><b>Sisa:</b> Rp <?= number_format(max($sisa,0)) ?></p>

    <span class="badge bg-<?= $status=="lunas"?"success":"warning" ?>">
        <?= strtoupper($status) ?>
    </span>
</div>

<?php if($status!="lunas"): ?>
<div class="card p-4 mb-4">
<form action="/pembayaran/upload" method="post" enctype="multipart/form-data">
    <label>Nominal Bayar</label>
    <input type="number" name="jumlah" class="form-control mb-3" required>

    <label>Bukti Transfer</label>
    <input type="file" name="bukti" class="form-control mb-3" required>

    <button class="btn btn-primary w-100">Kirim Pembayaran</button>
</form>
</div>
<?php endif; ?>

<h5>Riwayat Pembayaran</h5>
<table class="table table-bordered bg-white">
<tr>
    <th>Tanggal</th>
    <th>Jumlah</th>
    <th>Bukti</th>
</tr>
<?php foreach($riwayat as $r): ?>
<tr>
    <td><?= $r["tanggal_bayar"] ?></td>
    <td>Rp <?= number_format($r["jumlah"]) ?></td>
    <td><a href="<?= $r["bukti_transfer"] ?>" target="_blank">Lihat</a></td>
</tr>
<?php endforeach; ?>
</table>
