<?php 
$base = Config::base_url();
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Admin PPDB</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<!-- CSS -->
<link rel="stylesheet" href="<?= $base ?>/public/assets/css/admin.css">

</head>

<body>

<?php include "sidebar.php"; ?>

<div class="content">

    <h2>Dashboard Admin</h2>
    <p>Halo, <b><?= $_SESSION["nama_pengguna"] ?></b></p>

    <!-- TOP STAT BAR -->
    <div class="stat-row">

        <div class="stat-card purple">
            <div class="stat-info">
                <h3><?= $jumlah ?></h3>
                <p>Pendaftar Baru</p>
            </div>
            <div class="stat-icon"><i class="bi bi-inbox"></i></div>
        </div>

        <div class="stat-card blue">
            <div class="stat-info">
                <h3><?= $menunggu ?></h3>
                <p>Menunggu Validasi</p>
            </div>
            <div class="stat-icon"><i class="bi bi-clock-history"></i></div>
        </div>

        <div class="stat-card green">
            <div class="stat-info">
                <h3><?= $valid ?></h3>
                <p>Data Valid</p>
            </div>
            <div class="stat-icon"><i class="bi bi-check-all"></i></div>
        </div>

        <div class="stat-card red">
            <div class="stat-info">
                <h3><?= $tolak ?></h3>
                <p>Data Ditolak</p>
            </div>
            <div class="stat-icon"><i class="bi bi-x-circle"></i></div>
        </div>

    </div>

    <!-- TABLE TERBARU -->
    <h3 style="margin-top:30px; margin-bottom:15px;">Pendaftar Terbaru</h3>

    <div class="table-box">

        <table class="table-admin">
            <thead>
                <tr>
                    <th>Nama Pendaftar</th>
                    <th>NISN</th>
                    <th>Status</th>
                    <th>Tanggal Daftar</th>
                </tr>
            </thead>

            <tbody>

            <?php if (!empty($latest) && is_array($latest)): ?>
                <?php foreach($latest as $row): ?>
                    <tr>
                        <td><?= $row["nama_lengkap"] ?></td>
                        <td><?= $row["nisn"] ?></td>
                        <td><?= $row["status_data"] ?></td>
                        <td><?= $row["tanggal_daftar"] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align:center;color:#777;">
                        Belum ada data pendaftar terbaru.
                    </td>
                </tr>
            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>
