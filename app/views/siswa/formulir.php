<?php 
$active = "formulir"; 
?>

<div class="content px-4 py-4">

<h3>Formulir PPDB</h3>
<hr>

<form action="/siswa/formulir/simpan" method="post" id="formPendaftar">

<h4>Data Diri Siswa</h4>
<hr class="mb-4">

<div class="row">

    <div class="col-md-6">

        <label>NIK</label>
        <input name="nik" class="form-control mb-3" maxlength="16" required>

        <label>Nama Lengkap</label>
        <input name="nama_lengkap" class="form-control mb-3" required>

        <label>Tempat Lahir</label>
        <input name="tempat_lahir" class="form-control mb-3" required>

        <label>Agama</label>
        <select name="agama" class="form-control mb-3" required>
            <option></option>
            <option>Islam</option>
            <option>Kristen</option>
            <option>Katolik</option>
            <option>Hindu</option>
            <option>Buddha</option>
            <option>Konghucu</option>
            <option>Lainnya</option>
        </select>

        <label>Status Tinggal</label>
        <select name="status_tinggal" class="form-control mb-3" required>
            <option>bersama_ortu</option>
            <option>wali</option>
            <option>kost</option>
            <option>asrama</option>
            <option>lainnya</option>
        </select>

        <label>Anak ke</label>
        <input type="number" name="anak_ke" class="form-control mb-3" required>

    </div>


    <div class="col-md-6">

        <label>NISN</label>
        <input name="nisn" class="form-control mb-3" maxlength="10" required>

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control mb-3" required>
            <option></option>
            <option>Laki-laki</option>
            <option>Perempuan</option>
        </select>

        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control mb-3" required>

        <label>Alamat lengkap</label>
        <textarea name="alamat" class="form-control mb-3" required></textarea>

        <label>Asal Sekolah</label>
        <input name="asal_sekolah" class="form-control mb-3" required>

        <label>Jumlah Saudara</label>
        <input type="number" name="jumlah_saudara" class="form-control mb-3" required>

        <label>Tahun Lulus</label>
        <input type="number" name="tahun_lulus" class="form-control mb-3" required>

        <label>Nomor HP</label>
        <input name="nomor_hp" class="form-control mb-3" required>

    </div>

</div>


<h4 class="mt-5">Data Orang Tua</h4>
<hr>

<div class="row">
    <div class="col-md-6">
        <label>Nama Ayah</label>
        <input name="nama_ayah" class="form-control mb-3" required>

        <label>Nama Ibu</label>
        <input name="nama_ibu" class="form-control mb-3" required>
    </div>

    <div class="col-md-6">
        <label>Pendidikan Ayah</label>
        <input name="pendidikan_ayah" class="form-control mb-3" required>

        <label>Pendidikan Ibu</label>
        <input name="pendidikan_ibu" class="form-control mb-3" required>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label>Pekerjaan Ayah</label>
        <input name="pekerjaan_ayah" class="form-control mb-3" required>

        <label>Pekerjaan Ibu</label>
        <input name="pekerjaan_ibu" class="form-control mb-3" required>
    </div>

    <div class="col-md-6">
        <label>Penghasilan Ayah</label>
        <input name="penghasilan_ayah" class="form-control mb-3" required>

        <label>Penghasilan Ibu</label>
        <input name="penghasilan_ibu" class="form-control mb-3" required>
    </div>
</div>

<div class="row">

    <div class="col-md-6">
        <label>Nomor HP Ayah</label>
        <input name="hp_ayah" class="form-control mb-3" required>
    </div>

    <div class="col-md-6">
        <label>Nomor HP Ibu</label>
        <input name="hp_ibu" class="form-control mb-3" required>
    </div>

</div>

<h4 class="mt-5">Data Wali (Opsional)</h4>
<hr>

<div class="row">
    <div class="col-md-6">
        <label>Nama Wali</label>
        <input name="nama_wali" class="form-control mb-3">
    </div>

    <div class="col-md-6">
        <label>Pendidikan Wali</label>
        <input name="pendidikan_wali" class="form-control mb-3">
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label>Pekerjaan Wali</label>
        <input name="pekerjaan_wali" class="form-control mb-3">
    </div>

    <div class="col-md-6">
        <label>Penghasilan Wali</label>
        <input name="penghasilan_wali" class="form-control mb-3">
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label>No HP Wali</label>
        <input name="hp_wali" class="form-control mb-3">
    </div>
</div>

<button class="btn btn-primary mt-4">Simpan Data</button>

</form>
</div>
