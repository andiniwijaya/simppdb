<?php
$active = "dashboard";
ob_start();
?>

<h3 class="mb-3">
  <i class="bi bi-speedometer2 me-2"></i>Dashboard
</h3>

<!-- Progress Bar -->
<div class="card p-4 mb-4">
  <h5><i class="bi bi-graph-up-arrow me-2"></i>Progress Pendaftaran</h5>

  <div class="progress mb-2">
    <div class="progress-bar bg-success" style="width: <?= $progress ?>%;">
        <?= $progress ?>%
    </div>
  </div>

  <small class="text-muted">
    <?= $progress == 100 
      ? "✔ Semua proses selesai" 
      : "Lengkapi formulir, upload berkas, dan lakukan pembayaran untuk menyelesaikan pendaftaran." ?>
  </small>
</div>



<!-- Status Cards -->
<div class="row g-3">

  <!-- FORMULIR -->
  <div class="col-md-4">
    <div class="card p-3 text-center">

      <h6>Data Formulir</h6>

      <div class="status-box my-2">
        <?php if (!empty($siswa['nama_lengkap'])): ?>
          <i class="bi bi-check-circle-fill text-success fs-1"></i>
          <div>Selesai</div>
        <?php else: ?>
          <i class="bi bi-x-circle-fill text-danger fs-1"></i>
          <div>Belum Lengkap</div>
        <?php endif; ?>
      </div>

      <a href="/siswa/formulir" class="btn btn-outline-primary btn-sm">
        Lihat Formulir
      </a>

    </div>
  </div>



  <!-- UPLOAD -->
  <div class="col-md-4">
    <div class="card p-3 text-center">

      <h6>Upload Berkas</h6>

      <div class="status-box my-2">

        <?php
          $su = strtolower($latest_upload["status_berkas"]);
          if ($su !== "belum upload"):
        ?>
          <i class="bi bi-check-circle-fill text-success fs-1"></i>
          <div>Sudah Upload</div>

        <?php elseif($su == "ditolak"): ?>
          <i class="bi bi-x-circle-fill text-danger fs-1"></i>
          <div>Ditolak</div>

        <?php else: ?>
          <i class="bi bi-x-circle-fill text-danger fs-1"></i>
          <div>Belum Upload</div>
        <?php endif; ?>

      </div>

      <a href="/siswa/berkas_pendaftar" class="btn btn-outline-primary btn-sm">
        Upload Sekarang
      </a>

    </div>
  </div>



  <!-- PEMBAYARAN -->
  <div class="col-md-4">
    <div class="card p-3 text-center">

      <h6>Pembayaran</h6>

      <div class="status-box my-2">

        <?php
          $sb = strtolower($payment["status_bayar"]);

          if ($sb === "lunas"):
        ?>
          <i class="bi bi-check-circle-fill text-success fs-1"></i>
          <div>Lunas</div>

        <?php elseif ($sb === "pending" || $sb === "menunggu"): ?>
          <i class="bi bi-clock-fill text-warning fs-1"></i>
          <div>Menunggu Verifikasi</div>

        <?php else: ?>
          <i class="bi bi-x-circle-fill text-danger fs-1"></i>
          <div>Belum Bayar</div>
        <?php endif; ?>

      </div>

      <a href="/siswa/pembayaran" class="btn btn-outline-primary btn-sm">
        Kirim Bukti
      </a>

    </div>
  </div>

</div>



<!-- RINGKASAN -->
<div class="mt-4">
  <div class="card p-3">
    <h6>Ringkasan</h6>

    <ul class="mb-0">

      <li>
        <b>Nama:</b> <?= htmlspecialchars($siswa['nama_lengkap'] ?? '-') ?>
      </li>

      <li>
        <b>NISN:</b> <?= htmlspecialchars($siswa['nisn'] ?? '-') ?>
      </li>

      <li>
        <b>Status Berkas:</b> 
        <?= htmlspecialchars($latest_upload["status_berkas"]) ?>
      </li>

      <li>
        <b>Status Pembayaran:</b> 
        <?= htmlspecialchars($payment["status_bayar"]) ?>
      </li>

    </ul>

  </div>
</div>


<?php
$content = ob_get_clean();
require __DIR__."/layout_siswa.php";
?>
