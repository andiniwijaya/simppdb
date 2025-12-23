<div class="sidebar">

    <div class="p-3 text-center">
        <img src="/public/img/logo_smp.png">
        <h6 class="fw-bold mt-2 mb-1"><?= $_SESSION["nama_pengguna"] ?></h6>
        <small class="opacity-75 d-block mb-3">Siswa PPDB</small>
    </div>

    <a href="/dashboard" class="<?= ($active=="dashboard"?"active":"") ?>">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>

    <a href="/siswa/formulir"
       class="<?= ($active=="formulir"?"active":"") ?>">
       <i class="bi bi-file-earmark-text me-2"></i> Formulir
    </a>

    <a href="/siswa/berkas_pendaftar"
       class="<?= ($active=="berkas"?"active":"") ?>">
       <i class="bi bi-upload me-2"></i> Unggah Berkas
    </a>

    <a href="/siswa/pembayaran"
       class="<?= ($active=="bayar"?"active":"") ?>">
       <i class="bi bi-cash-coin me-2"></i> Pembayaran
    </a>

    <a href="/siswa/pengumuman"
       class="<?= ($active=="pengumuman"?"active":"") ?>">
       <i class="bi bi-megaphone-fill me-2"></i> Pengumuman
    </a>

    <hr style="border-color: rgba(255,255,255,0.2);">

    <a href="/logout">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
    </a>

</div>
