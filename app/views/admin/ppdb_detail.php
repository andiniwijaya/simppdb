<link rel="stylesheet" href="/css/ppdb_detail.css">

<h3>Detail PPDB</h3>

<table class="table">
<tr><th>Nama</th><td><?= $data['nama_lengkap'] ?></td></tr>
<tr><th>NISN</th><td><?= $data['nisn'] ?></td></tr>
<tr><th>Asal Sekolah</th><td><?= $data['asal_sekolah'] ?></td></tr>
<tr><th>Status</th><td><?= $data['status_data'] ?></td></tr>
<tr><th>Tanggal Daftar</th><td><?= $data['tanggal_daftar'] ?></td></tr>
</table>

<a href="/admin/ppdb" class="btn btn-secondary">Kembali</a>
