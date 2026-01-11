<?php $base = Config::base_url(); ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah User</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4" style="max-width:600px">

<h4 class="mb-3">➕ Tambah User</h4>

<form method="POST" action="<?= $base ?>/dashboard/user/store">

    <label>Nama Pengguna</label>
    <input type="text" name="nama_pengguna" class="form-control" required>

    <label class="mt-2">Email</label>
    <input type="email" name="email" class="form-control" required>

    <label class="mt-2">Kata Sandi</label>
    <input type="password" name="kata_sandi" class="form-control" minlength="8" required>

    <label class="mt-2">Peran</label>
    <select name="peran" class="form-control" required>
        <option value="admin">Admin</option>
        <option value="siswa">Siswa</option>
    </select>

    <button class="btn btn-primary mt-3 w-100">
        Simpan
    </button>

</form>

</div>
</body>
</html>
