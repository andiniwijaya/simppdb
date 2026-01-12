<?php
$base = Config::base_url();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data PPDB</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h4 class="mb-4">Edit Data PPDB</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="post" action="/admin/ppdb/update">

                <input type="hidden" name="id_pendaftar"
                       value="<?= htmlspecialchars($data['id_pendaftar'] ?? '') ?>">

                <!-- Nama Lengkap -->
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text"
                           name="nama_lengkap"
                           value="<?= htmlspecialchars($data['nama_lengkap'] ?? '') ?>"
                           class="form-control"
                           required>
                </div>

                <!-- NISN -->
                <div class="mb-3">
                    <label class="form-label">NISN</label>
                    <input type="text"
                           name="nisn"
                           value="<?= htmlspecialchars($data['nisn'] ?? '') ?>"
                           class="form-control"
                           required>
                </div>

                <!-- Asal Sekolah -->
                <div class="mb-3">
                    <label class="form-label">Asal Sekolah</label>
                    <input type="text"
                           name="asal_sekolah"
                           value="<?= htmlspecialchars($data['asal_sekolah'] ?? '') ?>"
                           class="form-control"
                           required>
                </div>

                <!-- Status Data -->
                <div class="mb-3">
                    <label class="form-label">Status Data</label>
                    <select name="status_data" class="form-select">
                        <option value="baru"
                            <?= ($data['status_data'] ?? '') === 'baru' ? 'selected' : '' ?>>
                            Baru
                        </option>
                        <option value="lengkap"
                            <?= ($data['status_data'] ?? '') === 'lengkap' ? 'selected' : '' ?>>
                            Lengkap
                        </option>
                        <option value="ditolak"
                            <?= ($data['status_data'] ?? '') === 'ditolak' ? 'selected' : '' ?>>
                            Ditolak
                        </option>
                    </select>
                </div>

                <!-- Tombol -->
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                    <a href="/admin/ppdb" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
