<?php
$base = Config::base_url();
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Formulir</title>
<link href="<?= $base ?>/public/bootstrap.css" rel="stylesheet">
</head>

<body>

<?php include "sidebar_siswa.php"; ?>

<div class="content">

<h3>Formulir Pendaftaran</h3>

<form method="post" action="<?= $base ?>/formulir/simpan">

  <label>Nama Lengkap</label>
  <input name="nama" value="<?= $pendaftar['nama'] ?? '' ?>" required>

  <label>NIK</label>
  <input name="nik" value="<?= $pendaftar['nik'] ?? '' ?>">

  <button type="submit" class="btn btn-primary">Simpan Formulir</button>

</form>

</div>

</body>
</html>
