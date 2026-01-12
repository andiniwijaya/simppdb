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

<div class="container-fluid px-4 mt-4">

    <!-- ================= HEADER ================= -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Kelola User</h3>
            <div class="text-muted small">
                Manajemen akun pengguna sistem PPDB
            </div>
        </div>

        <a href="/dashboard/user/create" class="btn btn-primary btn-sm">
            <i class="bi bi-person-plus me-1"></i>
            Tambah User
        </a>
    </div>

    <!-- ================= CARD ================= -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-borderless table-hover align-middle mb-0">

                    <!-- TABLE HEAD -->
                    <thead class="bg-light border-bottom">
                        <tr class="text-uppercase small text-muted">
                            <th width="4%">#</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Dibuat</th>
                            <th width="14%" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php if (!empty($users)): ?>
                        <?php $no = 1; foreach ($users as $u): ?>
                        <tr>

                            <td class="text-muted"><?= $no++ ?></td>

                            <!-- USERNAME -->
                            <td>
                                <div class="fw-semibold">
                                    <?= htmlspecialchars($u['nama_pengguna'] ?? '-') ?>
                                </div>
                                <div class="small text-muted">
                                    ID: <?= $u['id_pengguna'] ?>
                                </div>
                            </td>

                            <!-- EMAIL -->
                            <td>
                                <?= htmlspecialchars($u['email']) ?>
                            </td>

                            <!-- PASSWORD -->
                            <td>
                                <span class="badge bg-secondary-subtle text-dark">
                                    terenkripsi
                                </span>
                            </td>

                            <!-- CREATED -->
                            <td class="text-muted small">
                                <?= htmlspecialchars($u['dibuat_pada']) ?>
                            </td>

                            <!-- ACTION -->
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="/dashboard/user/edit?id=<?= $u['id_pengguna'] ?>"
                                       class="btn btn-outline-warning"
                                       title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="/dashboard/user/delete?id=<?= $u['id_pengguna'] ?>"
                                       class="btn btn-outline-danger"
                                       title="Hapus"
                                       onclick="return confirm('Yakin ingin menghapus user ini?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-people fs-1 d-block mb-2"></i>
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
