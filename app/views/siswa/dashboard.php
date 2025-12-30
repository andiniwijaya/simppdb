<?php
$active="dashboard";
?>

<h3 class="mb-3">
  <i class="bi bi-speedometer2 me-2"></i>Dashboard
</h3>

<!-- PROGRESS -->
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

<div class="row g-3">

  <!-- DATA FORMULIR -->
  <div class="col-md-4">
    <div class="card p-3 text-center">
      <h6>Data Formulir</h6>

      <?php if(empty($siswa["nama_lengkap"])): ?>
        <i class="bi bi-x-circle-fill text-danger fs-1 mb-2"></i>
        <small>Belum Lengkap</small>
      <?php else: ?>
        <i class="bi bi-check-circle-fill text-success fs-1 mb-2"></i>
        <small>Lengkap</small>
      <?php endif; ?>

      <a href="/siswa/formulir" class="btn btn-outline-primary btn-sm mt-3">
        Lihat Formulir
      </a>

      <?php if(!empty($siswa["nama_lengkap"])): ?>
        <a href="/siswa/formulir/cetak"
           target="_blank"
           class="btn btn-success btn-sm mt-2">
           <i class="bi bi-printer"></i> Cetak Formulir
        </a>
      <?php endif; ?>

    </div>
  </div>

  <!-- UNGGAH BERKAS -->
  <div class="col-md-4">
    <div class="card p-3 text-center">

      <h6>Unggah Berkas</h6>

      <?php if($status_upload === "lengkap"): ?>
          <i class="bi bi-check-circle-fill text-success fs-1 mb-2"></i>
          <small>Lengkap</small>

      <?php elseif($status_upload === "menunggu"): ?>
          <i class="bi bi-clock-fill text-warning fs-1 mb-2"></i>
          <small>Menunggu Verifikasi</small>

      <?php else: ?>
          <i class="bi bi-x-circle-fill text-danger fs-1 mb-2"></i>
          <small>Belum Upload</small>
      <?php endif; ?>

      <a href="/siswa/berkas_pendaftar"
         class="btn btn-outline-primary btn-sm mt-3">
        Upload Berkas
      </a>

    </div>
  </div>

  <!-- PEMBAYARAN -->
  <div class="col-md-4">
    <div class="card p-3 text-center">
      <h6>Pembayaran</h6>

      <?php if($payment["status_bayar"] === "lunas"): ?>
        <i class="bi bi-check-circle-fill text-success fs-1 mb-2"></i>
        <small>Lunas</small>
      <?php elseif($payment["status_bayar"] === "menunggu"): ?>
        <i class="bi bi-clock-fill text-warning fs-1 mb-2"></i>
        <small>Menunggu Verifikasi</small>
      <?php else: ?>
        <i class="bi bi-x-circle-fill text-danger fs-1 mb-2"></i>
        <small>Belum Bayar</small>
      <?php endif; ?>

      <a href="/siswa/pembayaran"
         class="btn btn-outline-primary btn-sm mt-3">
        Bayar
      </a>
    </div>
  </div>

  <!-- PENGUMUMAN -->
  <div class="col-md-4">
    <div class="card p-3 text-center">

      <h6>Pengumuman</h6>

      <?php if($status_pengumuman === "diterima"): ?>
          <i class="bi bi-patch-check-fill text-success fs-1 mb-2"></i>
          <div class="fw-semibold text-success">DITERIMA</div>

      <?php elseif($status_pengumuman === "tidak_diterima"): ?>
          <i class="bi bi-x-octagon-fill text-danger fs-1 mb-2"></i>
          <div class="fw-semibold text-danger">TIDAK DITERIMA</div>

      <?php else: ?>
          <i class="bi bi-hourglass-split text-warning fs-1 mb-2"></i>
          <div class="fw-semibold">MENUNGGU PENGUMUMAN</div>
      <?php endif; ?>

      <small class="text-muted d-block mt-2">
          Pengumuman akan ditampilkan setelah seleksi selesai
      </small>

    </div>
  </div>

</div>
