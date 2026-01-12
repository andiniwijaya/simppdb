<?php
$active = "formulir";
$base   = Config::base_url();

/*
Asumsi dari controller:
$siswa : data tabel pendaftar (array / null)
$ortu  : array data orang_tua (Ayah & Ibu)
$wali  : data wali (array / null)
*/

$hasSiswa = !empty($siswa);

// mapping ayah & ibu
$ayah = $ibu = null;
if (!empty($ortu)) {
    foreach ($ortu as $o) {
        if ($o['jenis'] === 'Ayah') $ayah = $o;
        if ($o['jenis'] === 'Ibu')  $ibu  = $o;
    }
}
?>

<div class="formulir-page">
<div class="content">

<div class="d-flex justify-content-between align-items-center mb-3">

    <div>
        <h3 class="fw-bold mb-0">
            <i class="bi bi-file-earmark-text me-2"></i> Formulir PPDB
        </h3>

        <?php if ($hasSiswa): ?>
            <small class="text-muted">
            </small>
        <?php else: ?>
            <small class="text-muted">
                Silakan isi formulir PPDB terlebih dahulu
            </small>
        <?php endif; ?>
    </div>

    <a href="/siswa/formulir?edit=1"
       class="btn <?= $hasSiswa ? 'btn-outline-primary' : 'btn-primary' ?> btn-sm">
        <i class="bi bi-pencil-square me-1"></i>
        <?= $hasSiswa ? 'Edit Data' : 'Isi Formulir' ?>
    </a>

</div>

<ul class="nav nav-tabs mb-4">

    <li class="nav-item">
        <button class="nav-link <?= ($_GET['tab'] ?? 'siswa')=='siswa'?'active':'' ?>"
                data-bs-toggle="tab" data-bs-target="#tabSiswa">
            Data Diri
        </button>
    </li>

    <li class="nav-item">
        <button class="nav-link <?= !$hasSiswa?'disabled':'' ?> <?= ($_GET['tab'] ?? '')=='ortu'?'active':'' ?>"
                <?= !$hasSiswa?'disabled':'' ?>
                data-bs-toggle="tab" data-bs-target="#tabOrtu">
            Data Orang Tua
        </button>
    </li>

    <li class="nav-item">
        <button class="nav-link <?= !$hasSiswa?'disabled':'' ?> <?= ($_GET['tab'] ?? '')=='wali'?'active':'' ?>"
                <?= !$hasSiswa?'disabled':'' ?>
                data-bs-toggle="tab" data-bs-target="#tabWali">
            Data Wali
        </button>
    </li>

</ul>

<div class="tab-content">

<!-- ===================== TAB SISWA ===================== -->
<div class="tab-pane fade <?= ($_GET['tab'] ?? 'siswa')=='siswa'?'show active':'' ?>" id="tabSiswa">

<form method="post" action="/siswa/formulir/simpan" class="formPendaftar">
<input type="hidden" name="save" value="siswa">
<input type="hidden" name="mode" value="<?= $hasSiswa ? 'update' : 'simpan' ?>">

<div class="card p-4 shadow-sm mb-4">
<h5 class="fw-bold mb-3">Data Siswa</h5>


<div class="row mb-3">
    <div class="col-md-6">
        <label>NIK</label>
        <input type="text" name="nik" maxlength="16" class="form-control" required
               value="<?= $siswa['nik'] ?? '' ?>">
    </div>

    <div class="col-md-6">
        <label>NISN</label>
        <input type="text"
               name="nisn"
               class="form-control"
               placeholder="Masukkan NISN"
               required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" required
               value="<?= $siswa['nama_lengkap'] ?? '' ?>">
    </div>

    <div class="col-md-3">
        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control" required
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
            <option value=""></option>
            <option value="Laki-laki" <?= ($siswa['jenis_kelamin'] ?? '')=='Laki-laki'?'selected':'' ?>>Laki-laki</option>
            <option value="Perempuan" <?= ($siswa['jenis_kelamin'] ?? '')=='Perempuan'?'selected':'' ?>>Perempuan</option>
        </select>
    </div>

    <div class="col-md-3">
        <label>Agama</label>
        <select name="agama" class="form-control" required>
            <option value=""></option>
            <?php
            $agama = ['Islam','Kristen','Katolik','Hindu','Budha','Konghucu','Lainnya'];
            foreach ($agama as $a) {
                $sel = ($siswa['agama'] ?? '')==$a?'selected':'';
                echo "<option value=\"$a\" $sel>$a</option>";
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

<div class="row mb-3">
    <div class="col-md-4">
        <label class="form-label">Status Anak</label>
        <select name="status_anak" class="form-control" required>
            <option value="">-- Pilih --</option>
            <option value="kandung" <?= ($siswa['status_anak'] ?? '')=='kandung'?'selected':'' ?>>Kandung</option>
            <option value="tiri" <?= ($siswa['status_anak'] ?? '')=='tiri'?'selected':'' ?>>Tiri</option>
            <option value="angkat" <?= ($siswa['status_anak'] ?? '')=='angkat'?'selected':'' ?>>Angkat</option>
        </select>
    </div>

    <div class="col-md-4">
        <label class="form-label">Status Yatim</label>
        <select name="yatim_status" class="form-control" required>
            <option value="">-- Pilih --</option>
            <?php
            $ys = ['bukan','yatim','piatu','yatim_piatu'];
            foreach ($ys as $v) {
                $sel = ($siswa['yatim_status'] ?? '') == $v ? 'selected' : '';
                echo "<option value=\"$v\" $sel>" . ucfirst(str_replace('_',' ',$v)) . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="col-md-4">
        <label class="form-label">Bahasa Sehari-hari</label>
        <input type="text" name="bahasa_rumah" class="form-control" required
               value="<?= $siswa['bahasa_rumah'] ?? '' ?>">
    </div>
</div>



<div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control" required><?= $siswa['alamat'] ?? '' ?></textarea>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Asal Sekolah</label>
        <input type="text" name="asal_sekolah" class="form-control" required
               value="<?= $siswa['asal_sekolah'] ?? '' ?>">
    </div>

    <div class="col-md-3">
        <label>Status Tinggal</label>
        <select name="status_tinggal" class="form-control" required>
            <option value=""></option>
            <?php
            $st = ['bersama_ortu','wali','kost','asrama','lainnya'];
            foreach ($st as $v) {
                $sel = ($siswa['status_tinggal'] ?? '')==$v?'selected':'';
                echo "<option value=\"$v\" $sel>$v</option>";
            }
            ?>
        </select>
    </div>

    <div class="col-md-3">
        <label>Tahun Lulus</label>
        <input type="number" name="tahun_lulus" class="form-control" required
               value="<?= $siswa['tahun_lulus'] ?? '' ?>">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <label>Tinggi Badan (cm)</label>
        <input type="number" name="tinggi_badan" class="form-control" required
               value="<?= $siswa['tinggi_badan'] ?? '' ?>">
    </div>

    <div class="col-md-4">
        <label>Berat Badan (kg)</label>
        <input type="number" name="berat_badan" class="form-control" required
               value="<?= $siswa['berat_badan'] ?? '' ?>">
    </div>

    <div class="col-md-4">
        <label>Penyakit</label>
        <textarea name="penyakit" class="form-control"><?= $siswa['penyakit'] ?? '' ?></textarea>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label>No HP</label>
        <input type="text" name="nomor_hp" class="form-control" required
               value="<?= $siswa['nomor_hp'] ?? '' ?>">
    </div>

    <div class="col-md-6">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required
               value="<?= $siswa['email'] ?? '' ?>">
    </div>
</div>

</div>

<button class="btn btn-primary w-100 mb-5">
    <?= $hasSiswa ? 'Update Data Diri' : 'Simpan Data Diri' ?>
</button>

</form>
</div>
<!-- ================== TAB ORANG TUA ==================== -->
<div class="tab-pane fade <?= ($_GET['tab'] ?? '')=='ortu'?'show active':'' ?>" id="tabOrtu">

<form method="post"
      action="/siswa/formulir/simpan"
      onsubmit="alert('Data orang tua berhasil disimpan')">

<input type="hidden" name="save" value="ortu">

<div class="card p-4 shadow-sm mb-4">

<!-- ================= DATA AYAH ================= -->
<h5 class="fw-bold mb-3">Data Ayah</h5>

<div class="mb-2">
    <label class="form-label">Nama Ayah</label>
    <input type="text" class="form-control" name="nama_ayah">
</div>

<div class="mb-2">
    <label class="form-label">Pendidikan Terakhir</label>
    <input type="text" class="form-control" name="pendidikan_ayah">
</div>

<div class="mb-2">
    <label class="form-label">Pekerjaan</label>
    <input type="text" class="form-control" name="pekerjaan_ayah">
</div>

<div class="mb-2">
    <label class="form-label">Penghasilan</label>
    <input type="text" class="form-control" name="penghasilan_ayah">
</div>

<div class="mb-2">
    <label class="form-label">No HP</label>
    <input type="text" class="form-control" name="hp_ayah">
</div>

<div class="mb-2">
    <label class="form-label">Tempat Lahir</label>
    <input type="text" class="form-control" name="tempat_lahir_ayah">
</div>

<div class="mb-3">
    <label class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control" name="tanggal_lahir_ayah">
</div>

<div class="mb-3">
    <label class="form-label">Alamat Rumah</label>
    <textarea class="form-control" name="alamat_rumah_ayah"></textarea>
</div>

<!-- ================= DATA IBU ================= -->
<h5 class="fw-bold mt-4 mb-3">Data Ibu</h5>

<div class="mb-2">
    <label class="form-label">Nama Ibu</label>
    <input type="text" class="form-control" name="nama_ibu">
</div>

<div class="mb-2">
    <label class="form-label">Pendidikan Terakhir</label>
    <input type="text" class="form-control" name="pendidikan_ibu">
</div>

<div class="mb-2">
    <label class="form-label">Pekerjaan</label>
    <input type="text" class="form-control" name="pekerjaan_ibu">
</div>

<div class="mb-2">
    <label class="form-label">Penghasilan</label>
    <input type="text" class="form-control" name="penghasilan_ibu">
</div>

<div class="mb-2">
    <label class="form-label">No HP</label>
    <input type="text" class="form-control" name="hp_ibu">
</div>

<div class="mb-2">
    <label class="form-label">Tempat Lahir</label>
    <input type="text" class="form-control" name="tempat_lahir_ibu">
</div>

<div class="mb-3">
    <label class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control" name="tanggal_lahir_ibu">
</div>

<div class="mb-3">
    <label class="form-label">Alamat Rumah</label>
    <textarea class="form-control" name="alamat_rumah_ibu"></textarea>
</div>

</div>

<button type="submit" class="btn btn-primary w-100 mb-5">
    Simpan Data Orang Tua
</button>

</form>
</div>


<!-- ===================== TAB WALI ====================== -->
<div class="tab-pane fade <?= ($_GET['tab'] ?? '')=='wali'?'show active':'' ?>" id="tabWali">

<form method="post" action="/siswa/formulir/simpan">
<input type="hidden" name="save" value="wali">

<div class="card p-4 shadow-sm mb-4">
<input class="form-control mb-2" name="nama_wali" placeholder="Nama Wali"
       value="<?= $wali['nama_orang_tua'] ?? '' ?>">
<input class="form-control mb-2" name="pendidikan_wali" placeholder="Pendidikan Terakhir"
       value="<?= $wali['pendidikan_terakhir'] ?? '' ?>">
<input class="form-control mb-2" name="pekerjaan_wali" placeholder="Pekerjaan"
       value="<?= $wali['pekerjaan'] ?? '' ?>">
<input class="form-control mb-2" name="penghasilan_wali" placeholder="Penghasilan"
       value="<?= $wali['penghasilan'] ?? '' ?>">
<input class="form-control mb-2" name="hp_wali" placeholder="No HP"
       value="<?= $wali['nomor_hp'] ?? '' ?>">
<input class="form-control mb-2" name="tempat_lahir_wali" placeholder="Tempat Lahir"
       value="<?= $wali['tempat_lahir'] ?? '' ?>">
<input type="date" class="form-control mb-2" name="tanggal_lahir_wali"
       value="<?= $wali['tanggal_lahir'] ?? '' ?>">
<textarea class="form-control" name="alamat_rumah_wali" placeholder="Alamat"><?= $wali['alamat_rumah'] ?? '' ?></textarea>
</div>

<button class="btn btn-primary w-100 mb-5">Simpan Data Wali</button>
</form>
</div>

</div>
</div>
</div>
