<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola User</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Kelola User</h4>
        <a href="/dashboard/user/create" class="btn btn-primary">
            + Tambah User
        </a>
    </div>

    <table class="table table-bordered table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th width="5%">No</th>
                <th>Nama Pengguna</th>
                <th>Email</th>
                <th>Peran</th>
                <th>Dibuat Pada</th>
                <th width="20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php $no = 1; foreach ($users as $u): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($u['nama_pengguna']) ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td>
                    </td>
                    <td><?= htmlspecialchars($u['dibuat_pada']) ?></td>
                    <td>
                        <!-- EDIT -->
                        <a href="/dashboard/user/edit?id=<?= $u['id_pengguna'] ?>"
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <!-- DELETE -->
                        <a href="/dashboard/user/delete?id=<?= $u['id_pengguna'] ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Yakin ingin menghapus user ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        Data user belum tersedia
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
