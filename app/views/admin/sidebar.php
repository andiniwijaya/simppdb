<?php 
$base = Config::base_url(); 
$uri  = $_SERVER['REQUEST_URI']; 
?>

<div class="sidebar">

    <div class="brand text-center">
        <img src="<?= $base ?>/public/img/logo_smp.png" class="logo-admin" width="65">
        <h5 class="mt-2 mb-0 fw-bold">PPDB ONLINE</h5>
        <small>SMP PGRI Arjasari</small>
    </div>

    <a href="<?= $base ?>/dashboard" 
       class="sidebar-link <?= ($uri == '/dashboard') ? 'active' : '' ?>">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>

    <a href="<?= $base ?>/dashboard/kelembagaan" 
       class="sidebar-link <?= (strpos($uri, '/dashboard/kelembagaan') !== false ? 'active' : '') ?>">
        <i class="bi bi-buildings me-2"></i> Kelembagaan
    </a>

    <a href="<?= $base ?>/dashboard/data_ppdb" 
       class="sidebar-link <?= (strpos($uri, '/dashboard/data-ppdb') !== false ? 'active' : '') ?>">
        <i class="bi bi-journal-text me-2"></i> Data PPDB
    </a>

    <a href="<?= $base ?>/dashboard/administrasi" 
       class="sidebar-link <?= (strpos($uri, '/dashboard/administrasi') !== false ? 'active' : '') ?>">
        <i class="bi bi-folder-check me-2"></i> Administrasi
    </a>

        <a href="<?= $base ?>/siswa/berkas_pendaftar"
   class="sidebar-link <?= (strpos($uri, '/siswa/berkas_pendaftar') !== false ? 'active' : '') ?>">
    <i class="bi bi-cloud-upload me-2"></i> Berkas
</a>

    <a href="<?= $base ?>/dashboard/pengumuman" 
       class="sidebar-link <?= (strpos($uri, '/dashboard/pengumuman') !== false ? 'active' : '') ?>">
        <i class="bi bi-megaphone me-2"></i> Pengumuman
    </a>

    <a href="<?= $base ?>/dashboard/pengaturan" 
       class="sidebar-link <?= (strpos($uri, '/dashboard/pengaturan') !== false ? 'active' : '') ?>">
        <i class="bi bi-gear-wide-connected me-2"></i> Pengaturan
    </a>
    

    <div class="logout-box mt-4">
        <a href="<?= $base ?>/logout" class="logout-link">
            <i class="bi bi-box-arrow-left me-2"></i> Logout
        </a>
    </div>

</div>
