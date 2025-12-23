<?php $active="pengumuman"; ?>

<h3 class="fw-bold mb-4 text-center">Pengumuman PPDB</h3>

<div class="card p-5 text-center">

<?php if($status == "menunggu"): ?>

    <i class="bi bi-clock-history text-warning fs-1 mb-3"></i>
    <h5 class="fw-bold">Pengumuman Belum Diumumkan</h5>
    <p class="text-muted">
        Silakan menunggu pengumuman resmi dari sekolah.
    </p>

<?php elseif($status == "diterima"): ?>

    <i class="bi bi-check-circle-fill text-success fs-1 mb-3"></i>
    <h4 class="fw-bold text-success">SELAMAT 🎉</h4>
    <p>
        Anda <b>DITERIMA</b> sebagai peserta didik baru.<br>
        Silakan melanjutkan proses administrasi.
    </p>

<?php else: ?>

    <i class="bi bi-x-circle-fill text-danger fs-1 mb-3"></i>
    <h5 class="fw-bold text-danger">MOHON MAAF</h5>
    <p>
        Anda <b>belum diterima</b> pada seleksi PPDB tahun ini.
    </p>

<?php endif; ?>

</div>
