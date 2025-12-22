<?php include __DIR__ . "/layout_siswa.php"; ?>

<div class="content px-4 py-4">

<h3>Formulir PPDB</h3>
<hr>

<form action="/formulir/simpan" method="post" id="formPendaftar">

<h5>IDENTITAS SISWA</h5>
<hr>

<label>NIK</label>
<input name="nik" class="form-control" maxlength="16" required><br>

<label>NISN</label>
<input name="nisn" class="form-control" maxlength="10" required><br>

<label>Nama Lengkap</label>
<input name="nama_lengkap" class="form-control" required><br>

<label>Jenis Kelamin</label>
<select name="jenis_kelamin" class="form-control" required>
<option></option>
<option>Laki-laki</option>
<option>Perempuan</option>
</select><br>

<label>Tempat Lahir</label>
<input name="tempat_lahir" class="form-control" required><br>

<label>Tanggal Lahir</label>
<input type="date" name="tanggal_lahir" class="form-control" required><br>

<label>Agama</label>
<select name="agama" class="form-control" required>
<option>Islam</option>
<option>Kristen</option>
<option>Katolik</option>
<option>Hindu</option>
<option>Buddha</option>
<option>Konghucu</option>
<option>Lainnya</option>
</select><br>

<label>Alamat lengkap</label>
<textarea name="alamat" class="form-control" required></textarea><br>

<label>Status Tinggal</label>
<select name="status_tinggal" class="form-control" required>
<option>bersama_ortu</option>
<option>wali</option>
<option>kost</option>
<option>asrama</option>
<option>lainnya</option>
</select><br>

<label>Asal Sekolah</label>
<input name="asal_sekolah" class="form-control" required><br>

<label>Anak ke</label>
<input type="number" name="anak_ke" class="form-control" required><br>

<label>Jumlah Saudara</label>
<input type="number" name="jumlah_saudara" class="form-control" required><br>

<label>Tahun Lulus</label>
<input type="number" name="tahun_lulus" class="form-control" required><br>

<label>Nomor HP</label>
<input name="nomor_hp" class="form-control" required><br>

<hr>
<h5>DATA AYAH</h5>
<hr>

<input name="nama_ayah" class="form-control" placeholder="Nama Ayah" required><br>
<input name="pendidikan_ayah" class="form-control" placeholder="Pendidikan Ayah" required><br>
<input name="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan Ayah" required><br>
<input name="penghasilan_ayah" class="form-control" placeholder="Penghasilan Ayah" required><br>
<input name="hp_ayah" class="form-control" placeholder="Nomor HP Ayah" required><br>

<hr>
<h5>DATA IBU</h5>
<hr>

<input name="nama_ibu" class="form-control" placeholder="Nama Ibu" required><br>
<input name="pendidikan_ibu" class="form-control" placeholder="Pendidikan Ibu" required><br>
<input name="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan Ibu" required><br>
<input name="penghasilan_ibu" class="form-control" placeholder="Penghasilan Ibu" required><br>
<input name="hp_ibu" class="form-control" placeholder="Nomor HP Ibu" required><br>

<hr>
<h5>DATA WALI (OPSIONAL)</h5>
<hr>

<input name="nama_wali" class="form-control" placeholder="Nama Wali"><br>
<input name="pendidikan_wali" class="form-control" placeholder="Pendidikan Wali"><br>
<input name="pekerjaan_wali" class="form-control" placeholder="Pekerjaan Wali"><br>
<input name="penghasilan_wali" class="form-control" placeholder="Penghasilan Wali"><br>
<input name="hp_wali" class="form-control" placeholder="Nomor HP Wali"><br>

<button class="btn btn-primary mt-4">
    Simpan Data
</button>

</form>

</div>
