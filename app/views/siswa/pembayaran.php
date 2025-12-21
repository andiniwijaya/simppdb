<?php $base = Config::base_url(); ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pembayaran</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= $base ?>/public/assets/css/pembayaran.css">

</head>
<body>

<?php include __DIR__."/sidebar_siswa.php"; ?>

<div class="wrapper">

  <h3>Pembayaran PPDB</h3>

  <div class="rekening-box">
    <h6><?= $rekening['bank']." - ".$rekening['nomor'] ?></h6>
    <p>a.n <?= $rekening['nama'] ?></p>
  </div>

  <form action="<?= $base ?>/pembayaran/upload" method="post" enctype="multipart/form-data" id="formBayar">

    <label>Jenis Pembayaran</label>
    <select name="jenis_pembayaran" class="form-control" required>
      <option value="">-- Pilih --</option>
      <option value="Uang Pendaftaran">Uang Pendaftaran</option>
      <option value="Uang Bangunan">Uang Bangunan</option>
      <option value="SPP">SPP</option>
      <option value="Seragam & Atribut">Seragam & Atribut</option>
    </select>

    <label class="mt-3">Nama Rekening Pengirim</label>
    <input name="nama_rekening" class="form-control" required>

    <label class="mt-3">Upload Bukti</label>
    <input type="file" name="bukti" accept=".jpg,.jpeg,.png,.pdf" class="form-control" required>

    <button class="btn btn-primary mt-4 w-100" id="btnSubmit">
      Upload Bukti
    </button>

  </form>

</div>

<!-- Custom JS -->
<script src="<?= $base ?>/public/assets/js/pembayaran.js"></script>

</body>
</html>
