<?php $active="berkas"; ?>
<link rel="stylesheet" href="<?= Config::base_url();?>/public/assets/css/berkas.css">

<div class="content">

<h3 class="fw-bold mb-4 text-center">Unggah Berkas Pendaftaran</h3>

<!-- ALERT -->
<?php if(isset($_SESSION["error"])): ?>
<div class="alert alert-danger">
    <?= $_SESSION["error"]; unset($_SESSION["error"]); ?>
</div>
<?php endif; ?>

<?php if(isset($_SESSION["success"])): ?>
<div class="alert alert-success">
    <?= $_SESSION["success"]; unset($_SESSION["success"]); ?>
</div>
<?php endif; ?>

<!-- STATUS BERKAS -->
<?php if($statusBerkas === "lengkap"): ?>
<div class="alert alert-success">
    ✔️ Semua berkas wajib telah diunggah
</div>
<?php elseif($statusBerkas === "menunggu"): ?>
<div class="alert alert-warning">
    ⚠️ Masih ada berkas wajib yang belum lengkap / tidak valid
</div>
<?php else: ?>
<div class="alert alert-secondary">
    ℹ️ Silakan unggah berkas pendaftaran
</div>
<?php endif; ?>

<!-- PROGRESS -->
<div class="progress mb-4">
    <div class="progress-bar bg-success" style="width: <?= $progressBerkas ?>%">
        <?= $progressBerkas ?>%
    </div>
</div>

<div class="card p-4 shadow-sm mb-5">

<table class="table table-bordered bg-white align-middle">
<thead class="table-light">
<tr>
    <th width="30%">Jenis Berkas</th>
    <th>Upload</th>
    <th width="15%">Aksi</th>
</tr>
</thead>

<tbody>

<?php
$berkasList = [
    "kartu_keluarga"          => "Kartu Keluarga",
    "ktp_ayah"                => "KTP Ayah",
    "ktp_ibu"                 => "KTP Ibu",
    "kip"                     => "Kartu Indonesia Pintar",
    "ijazah_sd"               => "Ijazah SD",
    "surat_keterangan_lulus"  => "Surat Keterangan Lulus",
    "akta_kelahiran"          => "Akta Kelahiran",
    "pas_foto"                => "Pas Foto"
];

// mapping jenis_berkas yang sudah diupload
$uploaded = [];
foreach($list as $b){
    $uploaded[$b["jenis_berkas"]] = $b;
}

foreach($berkasList as $key => $title):
    $sudahUpload = isset($uploaded[$key]);
?>

<tr>
<td><?= $title ?></td>

<td>
<?php if(!$sudahUpload): ?>
<form action="/siswa/berkas/upload" method="post" enctype="multipart/form-data">
    <input type="hidden" name="jenis_berkas" value="<?= $key ?>">
    <input type="file" name="file" class="form-control" required>
<?php else: ?>
    <span class="text-muted">Sudah diunggah</span>
<?php endif; ?>
</td>

<td>
<?php if(!$sudahUpload): ?>
    <button class="btn btn-primary btn-sm">Unggah</button>
</form>
<?php else: ?>
    <span class="badge bg-success">✔</span>
<?php endif; ?>
</td>

</tr>

<?php endforeach; ?>

</tbody>
</table>

</div>

<h5 class="fw-bold">Daftar Berkas Terkirim</h5>

<table class="table table-bordered mt-3 bg-white">
<thead class="table-light">
<tr>
    <th>Jenis</th>
    <th>File</th>
    <th>Status</th>
</tr>
</thead>

<tbody>
<?php if(empty($list)): ?>
<tr>
    <td colspan="3" class="text-center text-muted">
        Belum ada berkas diunggah
    </td>
</tr>
<?php else: ?>
<?php foreach($list as $b): ?>
<tr>
    <td><?= ucwords(str_replace("_"," ",$b["jenis_berkas"])) ?></td>
    <td>
        <a href="<?= $b["lokasi_berkas"] ?>" target="_blank">
            Lihat
        </a>
    </td>
    <td>
        <?php if($b["status_berkas"] === "valid"): ?>
            <span class="badge bg-success">Valid</span>
        <?php elseif($b["status_berkas"] === "invalid"): ?>
            <span class="badge bg-danger">Invalid</span>
        <?php else: ?>
            <span class="badge bg-warning text-dark">Menunggu</span>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
<?php endif; ?>
</tbody>
</table>

</div>

<script src="<?= Config::base_url();?>/public/assets/js/berkas.js"></script>
