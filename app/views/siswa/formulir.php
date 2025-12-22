<?php $active = "formulir"; ?>

<div class="content px-4 py-4">

<h3 class="mb-4">Formulir PPDB</h3>

<ul class="nav nav-tabs mb-4" id="formTabs">

    <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#dataDiri">
            Data Diri
        </button>
    </li>

    <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dataOrtu">
            Data Orang Tua
        </button>
    </li>

    <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dataWali">
            Data Wali
        </button>
    </li>

</ul>


<form action="/siswa/formulir/simpan" method="post">

<div class="tab-content">



<!--TAB 1 : DATA DIRI SISWA-->
<div class="tab-pane fade show active" id="dataDiri">

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
            <div class="col-md-6">
                <label>No HP</label>
                <input name="nomor_hp" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Email</label>
                <input name="email" class="form-control" required>
            </div>
        </div>

    </div>

</div>




<!--TAB 2 : DATA AYAH & IBU-->
<div class="tab-pane fade" id="dataOrtu">

    <div class="card p-4 shadow-sm mb-4">

        <h5 class="mb-3 fw-bold">Data Ayah</h5>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Nama Ayah</label>
                <input name="nama_ayah" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Pendidikan Ayah</label>
                <input name="pendidikan_ayah" class="form-control" required>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-6">
                <label>Pekerjaan Ayah</label>
                <input name="pekerjaan_ayah" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Penghasilan Ayah</label>
                <input name="penghasilan_ayah" class="form-control" required>
            </div>
        </div>


        <div class="mb-4 col-md-6">
            <label>No HP Ayah</label>
            <input name="hp_ayah" class="form-control" required>
        </div>



        <h5 class="mb-3 mt-4 fw-bold">Data Ibu</h5>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Nama Ibu</label>
                <input name="nama_ibu" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Pendidikan Ibu</label>
                <input name="pendidikan_ibu" class="form-control" required>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-6">
                <label>Pekerjaan Ibu</label>
                <input name="pekerjaan_ibu" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Penghasilan Ibu</label>
                <input name="penghasilan_ibu" class="form-control" required>
            </div>
        </div>


        <div class="mb-3 col-md-6">
            <label>No HP Ibu</label>
            <input name="hp_ibu" class="form-control" required>
        </div>

    </div>

</div>




<!--TAB 3 : DATA WALI OPSIONAL-->
<div class="tab-pane fade" id="dataWali">

    <div class="card p-4 shadow-sm mb-4">

        <h5 class="mb-3 fw-bold">Data Wali</h5>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Nama Wali</label>
                <input name="nama_wali" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Pendidikan Wali</label>
                <input name="pendidikan_wali" class="form-control">
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-6">
                <label>Pekerjaan Wali</label>
                <input name="pekerjaan_wali" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Penghasilan Wali</label>
                <input name="penghasilan_wali" class="form-control">
            </div>
        </div>


        <div class="col-md-6">
            <label>No HP Wali</label>
            <input name="hp_wali" class="form-control">
        </div>

    </div>

</div>


</div>


<button class="btn btn-primary mt-4">
    Simpan Semua Data
</button>

</form>

</div>
