<?php
$active="dashboard";
?>

<h3 class="mb-3">
  <i class="bi bi-speedometer2 me-2"></i>Dashboard
</h3>

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

  <div class="col-md-4">
    <div class="card p-3 text-center">
      <h6>Data Formulir</h6>
      <i class="bi <?= empty($siswa["nama_lengkap"]) ? "bi-x-circle-fill text-danger" : "bi-check-circle-fill text-success" ?> fs-1 mb-2"></i>
      <small><?= empty($siswa["nama_lengkap"]) ? "Belum Lengkap" : "Lengkap" ?></small>
      <a href="/siswa/formulir" class="btn btn-outline-primary btn-sm mt-3">Lihat Formulir</a>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card p-3 text-center">
      <h6>Upload Berkas</h6>
      <i class="bi <?= $latest_upload["status_berkas"]=="Belum Upload"?"bi-x-circle-fill text-danger":"bi-check-circle-fill text-success" ?> fs-1 mb-2"></i>
      <small><?= $latest_upload["status_berkas"] ?></small>
      <a href="/siswa/berkas_pendaftar" class="btn btn-outline-primary btn-sm mt-3">Upload</a>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card p-3 text-center">
      <h6>Pembayaran</h6>
      <i class="bi <?= $payment["status_bayar"]=="lunas"?"bi-check-circle-fill text-success":"bi-x-circle-fill text-danger" ?> fs-1 mb-2"></i>
      <small><?= $payment["status_bayar"] ?></small>
      <a href="/siswa/pembayaran" class="btn btn-outline-primary btn-sm mt-3">Bayar</a>
    </div>
  </div>

</div>
