<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">✏️ Edit User</h4>
        <a href="/dashboard/users" class="btn btn-secondary">
            ← Kembali
        </a>
    </div>

    <form action="/dashboard/user/update" method="post">


        <input type="hidden" name="id" value="<?= $data['id_pengguna'] ?>">

        <table class="table table-bordered table-striped align-middle">
            <tbody>
                <tr>
                    <th width="25%">Nama Pengguna</th>
                    <td>
                        <input type="text"
                               name="nama_pengguna"
                               class="form-control"
                               value="<?= htmlspecialchars($data['nama_pengguna']) ?>"
                               required>
                    </td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="<?= htmlspecialchars($data['email']) ?>"
                               required>
                    </td>
                </tr>

                <tr>
                    <th>Kata Sandi Baru</th>
                    <td>
                        <input type="password"
                               name="kata_sandi"
                               class="form-control"
                               placeholder="Kosongkan jika tidak diubah">
                        <small class="text-muted">
                            Biarkan kosong jika tidak ingin mengganti password
                        </small>
                    </td>
                </tr>

                <tr>
                    <th>Dibuat Pada</th>
                    <td>
                        <input type="text"
                               class="form-control"
                               value="<?= htmlspecialchars($data['dibuat_pada']) ?>"
                               disabled>
                    </td>
                </tr>

                <tr>
                    <th></th>
                    <td>
                        <button type="submit" class="btn btn-primary">
                            💾 Simpan Perubahan
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
