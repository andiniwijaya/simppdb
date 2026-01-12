<?php
$base = Config::base_url();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Berkas Pendaftar</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container-fluid mt-4">
        <!-- ================= HEADER ================= -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0">Verifikasi Berkas Pendaftar</h4>
            <span class="text-muted small">SIM PPDB</span>
        </div>

        <!-- ================= CARD ================= -->
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Siswa</th>
                                <th>Jenis Berkas</th>
                                <th>Berkas</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($list)): ?>
                                <?php foreach ($list as $row): ?>
                                    <tr>
                                        <!-- NAMA -->
                                        <td class="fw-semibold">
                                            <?= htmlspecialchars($row['nama_lengkap']) ?>
                                        </td>

                                        <!-- JENIS BERKAS -->
                                        <td>
                                            <?= ucwords(str_replace('_', ' ', $row['jenis_berkas'])) ?>
                                        </td>

                                        <!-- LINK BERKAS -->
                                        <td>
                                            <a href="/uploads/berkas/<?= htmlspecialchars($row['lokasi_berkas'] ?? '', ENT_QUOTES, 'UTF-8') ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye"></i> Lihat
                                            </a>
                                        </td>

                                        <!-- STATUS -->
                                        <td class="text-center">
                                            <?php
                                            $status = $row['status_berkas'];
                                            if ($status === 'valid') {
                                                echo '<span class="badge bg-success">VALID</span>';
                                            } elseif ($status === 'invalid') {
                                                echo '<span class="badge bg-danger">INVALID</span>';
                                            } else {
                                                echo '<span class="badge bg-warning text-dark">MENUNGGU</span>';
                                            }
                                            ?>
                                        </td>

                                        <!-- AKSI -->
                                        <td class="text-center">
                                            <?php if ($status === 'menunggu'): ?>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="/dashboard/validBerkas?id=<?= $row['id_berkas'] ?>" class="btn btn-success" onclick="return confirm('Validkan berkas ini?')">
                                                        <i class="bi bi-check-lg"></i>
                                                    </a>
                                                    <a href="/dashboard/invalidBerkas?id=<?= $row['id_berkas'] ?>" class="btn btn-danger" onclick="return confirm('Tolak berkas ini?')">
                                                        <i class="bi bi-x-lg"></i>
                                                    </a>
                                                </div>
                                            <?php else: ?>
                                                <span class="text-muted">—</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        <i class="bi bi-folder-x fs-4 d-block mb-1"></i>
                                        Belum ada berkas
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