<?php $base = Config::base_url(); ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Daftar Akun Siswa | PPDB SMP PGRI Arjasari</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons untuk icon mata -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<link rel="stylesheet" href="<?= $base ?>/public/assets/css/register.css">

</head>
<body>

<div class="register-wrapper">

  <div class="register-box">

    <div class="register-header">
      <img src="<?= $base ?>/public/img/logo_smp.png" style="height:70px">
      <h4 class="fw-bold mt-2 mb-0">Pendaftaran Akun Siswa</h4>
      <p>PPDB SMP PGRI Arjasari</p>
    </div>

    <div class="register-body">
    <form method="POST" action="/register/process">
        <label class="mt-1">Nama Pengguna</label>
        <input type="text" name="username" class="form-control"
          placeholder="Buat nama pengguna akun" required>

        <label class="mt-1">NISN</label>
        <input type="text" name="nisn" class="form-control"
          placeholder="Masukkan NISN siswa" required>

        <label class="mt-1">Email</label>
        <input type="email" name="email" class="form-control"
          placeholder="Email aktif" required>

          <!-- PASSWORD -->
<label class="mt-1">Kata Sandi</label>
<div class="position-relative">
  <input type="password" name="password"
    class="form-control pe-5"
    id="regPass"
    placeholder="Buat kata sandi akun"
    minlength="8"
    required>

  <i class="bi bi-eye-slash"
     id="toggleRegPass"
     style="
        position:absolute;
        right:15px;
        top:10px;
        font-size:18px;
        cursor:pointer;
        color:#555;">
  </i>
</div>

<!-- CONFIRM PASSWORD -->
<label class="mt-1">Konfirmasi Kata Sandi</label>
<div class="position-relative">
  <input type="password" name="confirm_password"
    class="form-control pe-5"
    id="regPassConfirm"
    placeholder="Ulangi kata sandi"
    minlength="8"
    required>

  <i class="bi bi-eye-slash"
     id="toggleRegPassConfirm"
     style="
        position:absolute;
        right:15px;
        top:10px;
        font-size:18px;
        cursor:pointer;
        color:#555;">
  </i>
</div>


        <!-- RECAPTCHA -->
        <div class="text-center mt-3 mb-2">
           <div class="g-recaptcha d-inline-block"
                data-sitekey="6LdpNi8sAAAAAERZdH5yuoqHz644ZxbKDKPprTvZ"></div>
        </div>

        <button class="btn btn-register w-100 mt-3" type="submit">
            Daftar Sekarang
        </button>

      </form>

    </div>

    <div class="register-footer">
        Sudah punya akun?
        <a href="<?= $base ?>/login">Login disini</a>
    </div>

  </div>
</div>

<!-- RECAPTCHA INIT -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- LOAD REGISTER JS -->
<script src="<?= $base ?>/public/assets/js/register.js"></script>

</body>
</html>
