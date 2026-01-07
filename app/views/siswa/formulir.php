<?php 
$active = "formulir"; 
$base   = Config::base_url();

$hasSiswa = !empty($siswa);
?>

<div class="formulir-page">
<div class="content">

<h3 class="fw-bold mb-3">
    <i class="bi bi-file-earmark-text me-2"></i> Formulir PPDB
</h3>

<ul class="nav nav-tabs mb-4" id="formTabs">

    <!-- TAB SISWA -->
    <li class="nav-item">
        <button class="nav-link <?= ($_GET['tab'] ?? 'siswa') == 'siswa' ? 'active' : '' ?>"
            data-bs-toggle="tab" data-bs-target="#tabSiswa">
            Data Diri
        </button>
    </li>

    <!-- TAB ORTU -->
    <li class="nav-item">
        <button class="nav-link <?= !$hasSiswa ? 'disabled' : (($_GET['tab'] ?? '')=='ortu'?'active':'') ?>"
            <?= !$hasSiswa ? 'disabled' : '' ?>
            data-bs-toggle="tab" data-bs-target="#tabOrtu">
            Data Orang Tua
        </button>
    </li>

    <!-- TAB WALI -->
    <li class="nav-item">
        <button class="nav-link <?= !$hasSiswa ? 'disabled' : (($_GET['tab'] ?? '')=='wali'?'active':'') ?>"
            <?= !$hasSiswa ? 'disabled' : '' ?>
            data-bs-toggle="tab" data-bs-target="#tabWali">
            Data Wali
        </button>
    </li>

</ul>

<div class="tab-content">

<!-- ================= TAB SISWA ================= -->
<div class="tab-pane fade <?= ($_GET['tab'] ?? 'siswa') == 'siswa' ? 'show active' : '' ?>" id="tabSiswa">

<form action="/siswa/formulir/simpan" method="post">
<input type="hidden" name="save" value="siswa">

<div class="card p-4 shadow-sm mb-4">
<h5 class="mb-3 fw-bold">Data Siswa</h5>

<div class="row mb-3">
    <div class="col-md-6">
        <label>NISN</label>
        <input name="nisn" class="form-control" required
               value="<?= $siswa['nisn'] ?? '' ?>">
    </div>

    <div class="col-md-6">
        <label>NIK</label>
        <input name="nik" class="form-control" required
               value="<?= $siswa['nik'] ?? '' ?>">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Nama Lengkap</label>
        <input name="nama_lengkap" class="form-control" required
               value="<?= $siswa['nama_lengkap'] ?? '' ?>">
    </div>

    <div class="col-md-3">
        <label>Tempat Lahir</label>
        <input name="tempat_lahir" class="form-control" required
               value="<?= $siswa['tempat_lahir'] ?? '' ?>">
    </div>

    <div class="col-md-3">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" required
               value="<?= $siswa['tanggal_lahir'] ?? '' ?>">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" required>
            <option value="">-</option>
            <option value="Laki-laki" <?= ($siswa['jenis_kelamin'] ?? '')=='Laki-laki'?'selected':'' ?>>Laki-laki</option>
            <option value="Perempuan" <?= ($siswa['jenis_kelamin'] ?? '')=='Perempuan'?'selected':'' ?>>Perempuan</option>
        </select>
    </div>

    <div class="col-md-3">
        <label>Agama</label>
        <select name="agama" class="form-control" required>
            <option value="">-</option>
            <?php
            $agamaList = ["Islam","Kristen","Katolik","Hindu","Buddha","Konghucu"];
            foreach($agamaList as $a){
                $sel = ($siswa['agama'] ?? '')==$a ? 'selected' : '';
                echo "<option $sel>$a</option>";
            }
            ?>
        </select>
    </div>

    <div class="col-md-3">
        <label>Anak Ke</label>
        <input type="number" name="anak_ke" class="form-control" required
               value="<?= $siswa['anak_ke'] ?? '' ?>">
    </div>

    <div class="col-md-3">
        <label>Jumlah Saudara</label>
        <input type="number" name="jumlah_saudara" class="form-control" required
               value="<?= $siswa['jumlah_saudara'] ?? '' ?>">
    </div>
</div>

<div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control" required><?= $siswa['alamat'] ?? '' ?></textarea>
</div>

</div>

<button class="btn btn-primary w-100 mb-5">
    <?= $hasSiswa ? 'Update Data Diri' : 'Simpan Data Diri' ?>
</button>

</form>
</div>

<!-- ================= TAB ORTU ================= -->
<div class="tab-pane fade <?= ($_GET['tab'] ?? '') == 'ortu' ? 'show active' : '' ?>" id="tabOrtu">

<form action="/siswa/formulir/simpan" method="post">
<input type="hidden" name="save" value="ortu">

<div class="card p-4 shadow-sm mb-4">
<h5 class="fw-bold mb-3">Data Ayah</h5>

<input name="nama_ayah" class="form-control mb-3"
       placeholder="Nama Ayah"
       value="<?= $ortu['nama_ayah'] ?? '' ?>">

<h5 class="fw-bold mt-4 mb-3">Data Ibu</h5>

<input name="nama_ibu" class="form-control"
       placeholder="Nama Ibu"
       value="<?= $ortu['nama_ibu'] ?? '' ?>">
</div>

<button class="btn btn-primary w-100 mb-5">
    Simpan Data Orang Tua
</button>

</form>
</div>

<!-- ================= TAB WALI ================= -->
<div class="tab-pane fade <?= ($_GET['tab'] ?? '') == 'wali' ? 'show active' : '' ?>" id="tabWali">

<form action="/siswa/formulir/simpan" method="post">
<input type="hidden" name="save" value="wali">

<div class="card p-4 shadow-sm mb-4">
<input name="nama_wali" class="form-control"
       placeholder="Nama Wali"
       value="<?= $wali['nama_wali'] ?? '' ?>">
</div>

<button class="btn btn-primary w-100 mb-5">
    Simpan Data Wali
</button>

</form>
</div>

</div>
</div>
</div>
