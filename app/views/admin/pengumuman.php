<?php
$base = Config::base_url();
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pengumuman Hasil PPDB</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <!-- ================= JUDUL ================= -->
    <div class="mb-3">
        <h4 class="fw-bold mb-0">Pengumuman Hasil PPDB</h4>
        <small class="text-muted">
            Status penerimaan peserta didik baru
        </small>
    </div>

    <!-- ================= CARD ================= -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>Nama Siswa</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php if (!empty($list)): ?>
                        <?php foreach ($list as $row): ?>
                        <tr>
                            <td class="fw-semibold">
                                <?= htmlspecialchars($row['nama_lengkap']) ?>
                            </td>

                            <td class="text-center">
                                <?php if ($row['status_penerimaan'] === 'diterima'): ?>
                                    <span class="badge bg-success px-3 py-2">
                                        🎉 DITERIMA
                                    </span>
                                <?php elseif ($row['status_penerimaan'] === 'ditolak'): ?>
                                    <span class="badge bg-danger px-3 py-2">
                                        ❌ DITOLAK
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark px-3 py-2">
                                        ⏳ MENUNGGU
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle fs-4 d-block mb-1"></i>
                                Data pengumuman belum tersedia
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
