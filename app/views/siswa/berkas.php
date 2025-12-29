<?php $active="berkas"; ?>
<link rel="stylesheet" href="<?= Config::base_url();?>/public/assets/css/berkas.css">

<div class="content">


<h3 class="fw-bold mb-4 text-center">Unggah Berkas Pendaftaran</h3>

<div class="card p-4 shadow-sm mb-5">

<table class="table table-bordered bg-white">
<thead class="table-light">
<tr>
    <th>Jenis Berkas</th>
    <th>Upload</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

<?php 
$berkasList = [
    "kartu_keluarga"          => "Kartu Keluarga",
    "ktp_orang_tua"           => "KTP Orang Tua",
    "kip"                     => "Kartu Indonesia Pintar",
    "ijazah_sd"               => "Ijazah SD",
    "surat_keterangan_lulus"  => "Surat Keterangan Lulus",
    "akta_kelahiran"          => "Akta Kelahiran",
    "pas_foto"                => "Pas Foto"
];

foreach($berkasList as $key => $title): ?>

<tr>
<td><?= $title ?></td>

<td>
<form action="/siswa/berkas/upload" 
      method="post" enctype="multipart/form-data">

    <input type="hidden" name="jenis_berkas" value="<?= $key ?>">

    <input type="file" name="file" class="form-control" required>
</td>

<td>
    <button class="btn btn-primary btn-sm">
        Unggah
    </button>
</form>
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
<?php foreach($list as $b): ?>
<tr>
    <td><?= $b["jenis_berkas"] ?></td>
    <td>
        <a href="<?= $b["lokasi_berkas"] ?>" target="_blank">
            Lihat
        </a>
    </td>
    <td><?= $b["status_berkas"] ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</div>

<script src="<?= Config::base_url();?>/public/assets/js/berkas.js"></script>
