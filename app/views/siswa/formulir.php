<?php 
$active = "formulir"; 
$base   = Config::base_url();
$tab    = $_GET['tab'] ?? 'siswa';
?>

<div class="content">

<h3 class="mb-4 fw-bold">Formulir PPDB</h3>

<div class="form-wrapper">

    <!-- TAB -->
    <ul class="nav nav-tabs" id="formTabs">

        <li class="nav-item">
            <button class="nav-link <?= $tab=='siswa'?'active':'' ?>"
                data-bs-toggle="tab" data-bs-target="#tabSiswa">
                Data Diri
            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link <?= $tab=='ortu'?'active':'' ?>"
                data-bs-toggle="tab" data-bs-target="#tabOrtu">
                Data Orang Tua
            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link <?= $tab=='wali'?'active':'' ?>"
                data-bs-toggle="tab" data-bs-target="#tabWali">
                Data Wali
            </button>
        </li>

    </ul>

    <!-- CARD FORM -->
    <div class="form-card">
    <div class="tab-content">

    <!-- ================= TAB DATA SISWA ================= -->
    <div class="tab-pane fade <?= $tab=='siswa'?'show active':'' ?>" id="tabSiswa">

    <form action="/siswa/formulir/simpan" method="post">
    <input type="hidden" name="save" value="siswa">

    <h5 class="mb-3 fw-bold">Data Siswa</h5>

    <div class="row">
        <div class="col-md-6">
            <label class="form-label">NISN</label>
            <input name="nisn" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">NIK</label>
            <input name="nik" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Nama Lengkap</label>
            <input name="nama_lengkap" class="form-control" required>
        </div>

        <div class="col-md-3">
            <label class="form-label">Tempat Lahir</label>
            <input name="tempat_lahir" class="form-control" required>
        </div>

        <div class="col-md-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
        </div>

        <div class="col-md-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Agama</label>
            <select name="agama" class="form-select" required>
                <option value="">-- Pilih Agama --</option>
                <option>Islam</option>
                <option>Kristen</option>
                <option>Katolik</option>
                <option>Hindu</option>
                <option>Buddha</option>
                <option>Konghucu</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Anak Ke</label>
            <input type="number" name="anak_ke" class="form-control" required>
        </div>

        <div class="col-md-3">
            <label class="form-label">Jumlah Saudara</label>
            <input type="number" name="jumlah_saudara" class="form-control" required>
        </div>

        <div class="col-md-12">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
    </div>

    <button class="btn btn-primary mt-4 w-100">
        Simpan Data Diri
    </button>

    </form>
    </div>

    <!-- ================= TAB DATA ORANG TUA ================= -->
    <div class="tab-pane fade <?= $tab=='ortu'?'show active':'' ?>" id="tabOrtu">

    <form action="/siswa/formulir/simpan" method="post">
    <input type="hidden" name="save" value="ortu">

    <h5 class="mb-3 fw-bold">Data Orang Tua</h5>

    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Nama Ayah</label>
            <input name="nama_ayah" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">No HP Ayah</label>
            <input name="hp_ayah" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Nama Ibu</label>
            <input name="nama_ibu" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">No HP Ibu</label>
            <input name="hp_ibu" class="form-control" required>
        </div>

        <div class="col-md-12">
            <label class="form-label">Alamat Orang Tua</label>
            <textarea name="alamat_ortu" class="form-control" required></textarea>
        </div>
    </div>

    <button class="btn btn-primary mt-4 w-100">
        Simpan Data Orang Tua
    </button>

    </form>
    </div>

    <!-- ================= TAB DATA WALI ================= -->
    <div class="tab-pane fade <?= $tab=='wali'?'show active':'' ?>" id="tabWali">

    <form action="/siswa/formulir/simpan" method="post">
    <input type="hidden" name="save" value="wali">

    <h5 class="mb-3 fw-bold">Data Wali</h5>

    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Nama Wali</label>
            <input name="nama_wali" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">No HP Wali</label>
            <input name="hp_wali" class="form-control">
        </div>

        <div class="col-md-12">
            <label class="form-label">Alamat Wali</label>
            <textarea name="alamat_wali" class="form-control"></textarea>
        </div>
    </div>

    <button class="btn btn-primary mt-4 w-100">
        Simpan Data Wali
    </button>

    </form>
    </div>

    </div> <!-- tab-content -->
    </div> <!-- form-card -->
</div> <!-- form-wrapper -->

</div>
