<?php 
$active = "formulir"; 
$base = Config::base_url();
?>
<div class="formulir-page">
<div class="content">

<h3 class="mb-4 fw-bold text-center">Formulir PPDB</h3>
<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex align-items-center gap-2 mb-2">
            <i class="bi bi-graph-up-arrow"></i>
            <strong>Progress Pengisian</strong>
        </div>

        <div class="progress mb-2" style="height:10px;">
            <div class="progress-bar bg-primary"
                 role="progressbar"
                 style="width: <?= $progress ?? 0 ?>%">
            </div>
        </div>

        <small class="text-muted">
            Lengkapi semua bagian hingga 100%.
        </small>
    </div>
</div>


<ul class="nav nav-tabs mb-4" id="formTabs">

    <li class="nav-item">
        <button class="nav-link <?= ($_GET['tab']??'siswa')=='siswa'?'active':'' ?>"
            data-bs-toggle="tab" data-bs-target="#tabSiswa">
            Data Diri
        </button>
    </li>

    <li class="nav-item">
        <button class="nav-link <?= ($_GET['tab']??'siswa')=='ortu'?'active':'' ?>"
            data-bs-toggle="tab" data-bs-target="#tabOrtu">
            Data Orang Tua
        </button>
    </li>

    <li class="nav-item">
        <button class="nav-link <?= ($_GET['tab']??'siswa')=='wali'?'active':'' ?>"
            data-bs-toggle="tab" data-bs-target="#tabWali">
            Data Wali
        </button>
    </li>

</ul>


<div class="tab-content">



<!-- TAB 1 : DATA SISWA -->

<div class="tab-pane fade <?= ($_GET['tab']??'siswa')=='siswa'?'show active':'' ?>"
     id="tabSiswa">

<form action="/siswa/formulir/simpan" method="post">
<input type="hidden" name="save" value="siswa">

<div class="card p-4 shadow-sm mb-4">

<h5 class="mb-3 fw-bold">Data Siswa</h5>

<div class="row mb-3">
    <div class="col-md-6">
        <label>NISN</label>
        <input name="nisn" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label>NIK</label>
        <input name="nik" class="form-control" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Nama Lengkap</label>
        <input name="nama_lengkap" class="form-control" required>
    </div>

    <div class="col-md-3">
        <label>Tempat Lahir</label>
        <input name="tempat_lahir" class="form-control" required>
    </div>

    <div class="col-md-3">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" required>
            <option></option>
            <option>Laki-laki</option>
            <option>Perempuan</option>
        </select>
    </div>

    <div class="col-md-3">
        <label>Agama</label>
        <select name="agama" class="form-control" required>
            <option></option>
            <option>Islam</option>
            <option>Kristen</option>
            <option>Katolik</option>
            <option>Hindu</option>
            <option>Buddha</option>
            <option>Konghucu</option>
        </select>
    </div>

    <div class="col-md-3">
        <label>Anak Ke</label>
        <input type="number" name="anak_ke" class="form-control" required>
    </div>

    <div class="col-md-3">
        <label>Jumlah Saudara</label>
        <input type="number" name="jumlah_saudara" class="form-control" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <label>Status Anak</label>
        <select name="status_anak" class="form-control" required>
            <option></option>
            <option>kandung</option>
            <option>tiri</option>
            <option>angkat</option>
        </select>
    </div>

    <div class="col-md-4">
        <label>Status Yatim</label>
        <select name="yatim_status" class="form-control" required>
            <option></option>
            <option>bukan</option>
            <option>yatim</option>
            <option>piatu</option>
            <option>yatim_piatu</option>
        </select>
    </div>

    <div class="col-md-4">
        <label>Bahasa Sehari-hari</label>
        <input name="bahasa_rumah" class="form-control" required>
    </div>
</div>

<div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control" required></textarea>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Asal Sekolah</label>
        <input name="asal_sekolah" class="form-control" required>
    </div>

    <div class="col-md-3">
        <label>Status Tinggal</label>
        <select name="status_tinggal" class="form-control" required>
            <option></option>
            <option>bersama_ortu</option>
            <option>wali</option>
            <option>kost</option>
            <option>asrama</option>
            <option>lainnya</option>
        </select>
    </div>

    <div class="col-md-3">
        <label>Tahun Lulus</label>
        <input type="number" name="tahun_lulus" class="form-control" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <label>Tinggi Badan (cm)</label>
        <input type="number" name="tinggi_badan" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label>Berat Badan (kg)</label>
        <input type="number" name="berat_badan" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label>Penyakit yang diderita</label>
        <input name="penyakit" class="form-control">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label>No HP</label>
        <input type="number" name="nomor_hp" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label>Email</label>
        <input name="email" class="form-control" required>
    </div>
</div>


</div>

<button class="btn btn-primary mb-5 w-100">
    Simpan Data Diri
</button>

</form>

</div>



<!-- TAB 2 : DATA ORANG TUA -->

<div class="tab-pane fade <?= ($_GET['tab'] ?? '') == 'ortu' ? 'show active' : '' ?>"
     id="tabOrtu">

<form action="/siswa/formulir/simpan" method="post">
<input type="hidden" name="save" value="ortu">

<div class="card p-4 shadow-sm mb-4">

<h5 class="mb-3 fw-bold">Data Ayah</h5>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Nama Ayah</label>
        <input name="nama_ayah" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label>Pendidikan Terakhir</label>
        <input name="pendidikan_ayah" class="form-control" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <label>Tempat Lahir Ayah</label>
        <input name="tempat_lahir_ayah" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label>Tanggal Lahir Ayah</label>
        <input type="date" name="tanggal_lahir_ayah" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label>Pekerjaan Ayah</label>
        <input name="pekerjaan_ayah" class="form-control" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Penghasilan Ayah</label>
        <input name="penghasilan_ayah" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label>No HP Ayah</label>
        <input name="hp_ayah" class="form-control" required>
    </div>
</div>

<div class="mb-3">
<label>Alamat Rumah Ayah</label>
<textarea name="alamat_rumah_ayah" class="form-control" required></textarea>
</div>


<!-- DATA IBU -->

<h5 class="mb-3 mt-5 fw-bold">Data Ibu</h5>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Nama Ibu</label>
        <input name="nama_ibu" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label>Pendidikan Terakhir</label>
        <input name="pendidikan_ibu" class="form-control" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <label>Tempat Lahir Ibu</label>
        <input name="tempat_lahir_ibu" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label>Tanggal Lahir Ibu</label>
        <input type="date" name="tanggal_lahir_ibu" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label>Pekerjaan Ibu</label>
        <input name="pekerjaan_ibu" class="form-control" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Penghasilan Ibu</label>
        <input name="penghasilan_ibu" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label>No HP Ibu</label>
        <input name="hp_ibu" class="form-control" required>
    </div>
</div>


<div class="mb-3">
<label>Alamat Rumah Ibu</label>
<textarea name="alamat_rumah_ibu" class="form-control" required></textarea>
</div>


</div>

<button class="btn btn-primary mb-5 w-100">
    Simpan Data Orang Tua
</button>

</form>

</div>



<!-- TAB 3 : DATA WALI -->

<div class="tab-pane fade <?= ($_GET['tab'] ?? '') == 'wali' ? 'show active' : '' ?>"
     id="tabWali">

<form action="/siswa/formulir/simpan" method="post">
<input type="hidden" name="save" value="wali">

<div class="card p-4 shadow-sm mb-4">

<h5 class="mb-3 fw-bold">Data Wali</h5>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Nama Wali</label>
        <input name="nama_wali" class="form-control">
    </div>

    <div class="col-md-6">
        <label>Pendidikan Terakhir</label>
        <input name="pendidikan_wali" class="form-control">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <label>Tempat Lahir</label>
        <input name="tempat_lahir_wali" class="form-control">
    </div>

    <div class="col-md-4">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir_wali" class="form-control">
    </div>

    <div class="col-md-4">
        <label>Pekerjaan</label>
        <input name="pekerjaan_wali" class="form-control">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label>Penghasilan</label>
        <input name="penghasilan_wali" class="form-control">
    </div>

    <div class="col-md-6">
        <label>No HP</label>
        <input name="hp_wali" class="form-control">
    </div>
</div>

<div class="mb-3">
<label>Alamat Rumah Wali</label>
<textarea name="alamat_rumah_wali" class="form-control"></textarea>
</div>

</div>

<button class="btn btn-primary mb-5 w-100">
    Simpan Data Wali
</button>

</form>
</div>


</div>

</div>

</div>
