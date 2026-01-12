<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>

    <!-- BOOTSTRAP THEME (Minty) -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/minty/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width:600px">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah User</h5>
        </div>

        <div class="card-body">

            <form method="POST" action="/dashboard/user/store">

                <!-- NAMA PENGGUNA -->
                <div class="mb-3">
                    <label class="form-label">Nama Pengguna</label>
                    <input type="text"
                           name="nama_pengguna"
                           class="form-control"
                           placeholder="contoh: admin01"
                           required>
                </div>

                <div class="mb-3">
    <label for="nisn" class="form-label">NISN</label>
    <input
        type="text"
        id="nisn"
        name="nisn"
        class="form-control"
        required
    >
</div>

                <!-- EMAIL -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="user@email.com"
                           required>
                </div>

                <!-- PASSWORD -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password"
                           name="kata_sandi"
                           class="form-control"
                           placeholder="Minimal 8 karakter"
                           minlength="8"
                           required>
                </div>

                <!-- KONFIRMASI PASSWORD -->
                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password"
                           name="konfirmasi"
                           class="form-control"
                           placeholder="Ulangi password"
                           minlength="8"
                           required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/dashboard/users" class="btn btn-secondary">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Simpan User
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
