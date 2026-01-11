<?php
$base = Config::base_url();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width:600px">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"> Tambah User</h5>
        </div>

        <div class="card-body">

            <form method="POST" action="<?= $base ?>/dashboard/user/store">

                <!-- USERNAME -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Pengguna</label>
                    <input type="text"
                           name="username"
                           class="form-control"
                           placeholder="contoh: admin01"
                           required>
                </div>

                <!-- EMAIL -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="user@email.com"
                           required>
                </div>

                <!-- PASSWORD -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Minimal 8 karakter"
                           minlength="8"
                           required>
                </div>

                <!-- KONFIRMASI PASSWORD -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Konfirmasi Password</label>
                    <input type="password"
                           name="confirm_password"
                           class="form-control"
                           placeholder="Ulangi password"
                           minlength="8"
                           required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= $base ?>/dashboard/users" class="btn btn-secondary">
                        ← Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        💾 Simpan User
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
