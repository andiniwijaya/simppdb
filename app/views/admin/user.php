<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola User</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h4 class="mb-3">Kelola User</h4>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th width="5%">No</th>
                <th>Nama Pengguna</th>
                <th>Kata Sandi</th>
                <th>Email</th>
                <th>Dibuat Pada</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php $no = 1; foreach ($users as $u): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($u['nama_pengguna']) ?></td>
                    <td><?= htmlspecialchars($u['kata_sandi']) ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td><?= htmlspecialchars($u['dibuat_pada']) ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Data user belum tersedia
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

<!-- BOOTSTRAP JS (opsional, tapi aman dipasang) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
