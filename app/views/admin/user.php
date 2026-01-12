<?php
$base = Config::base_url();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola User</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container-fluid mt-4">

    <!-- ================= HEADER ================= -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="fw-bold mb-0">Kelola User</h4>
            <small class="text-muted">Manajemen akun pengguna sistem</small>
        </div>

        <a href="/dashboard/user/create" class="btn btn-primary">
            <i class="bi bi-person-plus"></i>
            Tambah User
        </a>
    </div>

    <!-- ================= CARD ================= -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>Kata Sandi</th>
                            <th>Dibuat Pada</th>
                            <th width="18%" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php if (!empty($users)): ?>
                        <?php $no = 1; foreach ($users as $u): ?>
                        <tr>

                            <td><?= $no++ ?></td>

                            <td class="fw-semibold">
                                <?= htmlspecialchars($u['nama_pengguna'] ?? '-') ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($u['email']) ?>
                            </td>

                            <td style="font-size:12px; word-break: break-all;">
                                <span class="text-muted">
                                    <?= htmlspecialchars($u['kata_sandi']) ?>
                                </span>
                            </td>

                            <td>
                                <?= htmlspecialchars($u['dibuat_pada']) ?>
                            </td>

                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="/dashboard/user/edit?id=<?= $u['id_pengguna'] ?>"
                                       class="btn btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="/dashboard/user/delete?id=<?= $u['id_pengguna'] ?>"
                                       class="btn btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus user ini?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="bi bi-people fs-4 d-block mb-1"></i>
                                Data user belum tersedia
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
