<?php $active="berkas"; ?>

<link rel="stylesheet" href="<?= Config::base_url();?>/public/assets/css/berkas.css">

<div class="content">

<h3 class="fw-bold mb-4 text-center">
  Upload Berkas Pendaftaran
</h3>

<div class="card p-4 shadow-sm">

<form action="/siswa/berkas/upload" 
      method="post" enctype="multipart/form-data" 
      id="formUpload">

    <label class="form-label fw-bold">Jenis Berkas</label>
    <select name="jenis_berkas" class="form-control mb-3" required>
        <option></option>
        <option value="kartu_keluarga">Kartu Keluarga</option>
        <option value="ktp_orang_tua">KTP Orang Tua</option>
        <option value="kip">Kartu Indonesia Pintar</option>
        <option value="ijazah_sd">Ijazah SD</option>
        <option value="surat_keterangan_lulus">Surat Keterangan Lulus</option>
        <option value="akta_kelahiran">Akta Kelahiran</option>
        <option value="pas_foto">Pas Foto</option>
    </select>

    <label class="form-label fw-bold">Pilih File</label>
    <input type="file" name="file" class="form-control mb-3" required>

    <button class="btn btn-primary w-100">
        Upload Berkas
    </button>

</form>

</div>


<h5 class="mt-5 fw-bold">Daftar Berkas Terkirim</h5>

<table class="table table-bordered mt-3 bg-white">
<thead class="table-light">
    <tr>
        <th>Jenis</th>
        <th>Lokasi</th>
        <th>Status</th>
    </tr>
</thead>

<tbody>
<?php foreach($list as $b): ?>
<tr>
    <td><?= $b["jenis_berkas"] ?></td>
    <td>
        <a href="<?= $b["lokasi_berkas"] ?>" target="_blank">
            Lihat File
        </a>
    </td>
    <td><?= $b["status_berkas"] ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</div>

<script src="<?= Config::base_url();?>/public/assets/js/berkas.js"></script>
