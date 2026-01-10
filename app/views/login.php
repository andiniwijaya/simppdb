<?php 
$base = Config::base_url();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Portal Login | PPDB Online</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="<?= $base ?>/public/assets/css/login.css?v=<?= time() ?>">
</head>

<body>

<!-- ================= LOGIN SUCCESS ALERT DATA ================= -->
<?php if(isset($_SESSION['login_success'])): ?>
    <div id="login-success" data-nama="<?= htmlspecialchars($_SESSION['login_success']) ?>"></div>
    <?php unset($_SESSION['login_success']); ?>
<?php endif; ?>

<!-- ================= LOGIN ERROR DATA ================= -->
<?php if(isset($_GET["error"])): ?>
    <div id="login-error" data-type="<?= $_GET['error']; ?>"></div>
<?php endif; ?>

<div class="login-wrapper">

    <!-- ================= LEFT PANEL ================= -->
    <div class="left-panel">
        <h2 class="fw-bold">SIM-PPDB</h2>
        <p>Sistem Informasi Penerimaan Peserta Didik Baru</p>
    </div>

    <!-- ================= RIGHT PANEL ================= -->
    <div class="right-panel">
        <div class="login-card">

            <!-- LOGO -->
            <div class="text-center mb-3">
                <img src="<?= $base ?>/public/img/logo_smp.png" alt="Logo SMP" style="height:75px">
            </div>

            <!-- TITLE -->
            <h4 class="text-center fw-bold">Login</h4>
            <p class="text-center mb-4">Masukkan akun kamu</p>

            <!-- FORM -->
            <form method="POST" action="<?= $base ?>/login">

                <!-- USERNAME -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">NISN / Nama Pengguna</label>
                    <input type="text"
                           name="login_id"
                           class="form-control"
                           placeholder="username atau nisn"
                           required>
                    <small class="text-muted">
                        *NISN / Nama Pengguna wajib diisi
                    </small>
                </div>

                <!-- PASSWORD -->
                <div class="mb-3 position-relative">
                    <label class="form-label fw-semibold">Kata Sandi</label>

                    <input type="password"
                           name="password"
                           class="form-control pe-5"
                           id="passField"
                           minlength="8"
                           required>

                    <i class="bi bi-eye-slash"
                       id="togglePass"
                       style="
                            position:absolute;
                            right:15px;
                            top:42px;
                            cursor:pointer;
                            font-size:18px;
                            color:#555;">
                    </i>

                    <small class="text-muted">
                        *Password Minimal 8 karakter
                    </small>
                </div>

                <button type="submit" class="btn btn-login w-100">
                    Masuk
                </button>

                <!-- LINKS -->
                <div class="text-center mt-3">
                    <small>
                        Belum punya akun?
                        <a href="<?= $base ?>/register" class="fw-semibold text-primary">
                            Daftar Sekarang
                        </a>
                    </small>
                    <br>
                    <small>
                        <a href="<?= $base ?>/forgot" class="text-danger fw-semibold">
                            Lupa Kata Sandi?
                        </a>
                    </small>
                </div>

            </form>
        </div>
    </div>

</div>

<script src="<?= $base ?>/public/assets/js/login.js"></script>
</body>
</html>
