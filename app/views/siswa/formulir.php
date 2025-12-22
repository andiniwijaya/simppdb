<?php
$active = "formulir";
?>

<div class="content px-4 py-4">

<h3 class="mb-4">Formulir PPDB</h3>

<!-- TAB MENU -->
<ul class="nav nav-tabs mb-4" id="formTabs">

    <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tabSiswa">
            Data Siswa
        </button>
    </li>

    <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tabOrtu">
            Data Orang Tua
        </button>
    </li>

</ul>

<form action="/siswa/formulir/simpan" method="post">

<div class="tab-content">


    <!-- ================= TAB: DATA SISWA ================= -->
    <div class="tab-pane fade show active" id="tabSiswa">

        <div class="row">

            <div class="col-md-6">

                <div class="mb-3">
                    <label>NIK</label>
                    <input name="nik" class="form-control" maxlength="16" required>
                </div>

                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input name="nama_lengkap" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Tempat Lahir</label>
                    <input name="tempat_lahir" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Agama</label>
                    <select name="agama" class="form-control" required>
                        <option></option>
                        <option>Islam</option>
                        <option>Kristen</option>
                        <option>Katolik</option>
                        <option>Hindu</option>
                        <option>Buddha</option>
                        <option>Konghucu</option>
                        <option>Lainnya</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Status Tinggal</label>
                    <select name="status_tinggal" class="form-control" required>
                        <option>bersama_ortu</option>
                        <option>wali</option>
                        <option>kost</option>
                        <option>asrama</option>
                        <option>lainnya</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Anak ke</label>
                    <input type="number" name="anak_ke" class="form-control" required>
                </div>

            </div>


            <div class="col-md-6">

                <div class="mb-3">
                    <label>NISN</label>
                    <input name="nisn" class="form-control" maxlength="10" required>
                </div>

                <div class="mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option></option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Alamat lengkap</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label>Asal Sekolah</label>
                    <input name="asal_sekolah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Jumlah Saudara</label>
                    <input type="number" name="jumlah_saudara" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Tahun Lulus</label>
                    <input type="number" name="tahun_lulus" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Nomor HP</label>
                    <input name="nomor_hp" class="form-control" required>
                </div>

            </div>

        </div>

        <button type="button" class="btn btn-primary mt-3" onclick="switchToOrtu()">
            Lanjut ke Data Orang Tua →
        </button>

    </div>




    <!-- ================= TAB: DATA ORANG TUA ================= -->
    <div class="tab-pane fade" id="tabOrtu">

        <div class="row">

            <!-- DATA AYAH -->
            <div class="col-md-6 border-end pe-4">

                <h5 class="mb-4">Data Ayah</h5>

                <div class="mb-3">
                    <label>Nama Ayah</label>
                    <input name="nama_ayah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Pendidikan Ayah</label>
                    <input name="pendidikan_ayah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Pekerjaan Ayah</label>
                    <input name="pekerjaan_ayah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Penghasilan Ayah</label>
                    <input name="penghasilan_ayah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Nomor HP Ayah</label>
                    <input name="hp_ayah" class="form-control" required>
                </div>

            </div>


            <!-- DATA IBU -->
            <div class="col-md-6 ps-4">

                <h5 class="mb-4">Data Ibu</h5>

                <div class="mb-3">
                    <label>Nama Ibu</label>
                    <input name="nama_ibu" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Pendidikan Ibu</label>
                    <input name="pendidikan_ibu" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Pekerjaan Ibu</label>
                    <input name="pekerjaan_ibu" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Penghasilan Ibu</label>
                    <input name="penghasilan_ibu" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Nomor HP Ibu</label>
                    <input name="hp_ibu" class="form-control" required>
                </div>

            </div>

        </div>


        <hr class="my-4">


        <!-- DATA WALI OPSIONAL -->
        <h5 class="mb-3">Data Wali (Opsional)</h5>

        <div class="row">

            <div class="col-md-4">
                <label>Nama Wali</label>
                <input name="nama_wali" class="form-control mb-3">
            </div>

            <div class="col-md-4">
                <label>Pendidikan Wali</label>
                <input name="pendidikan_wali" class="form-control mb-3">
            </div>

            <div class="col-md-4">
                <label>Pekerjaan Wali</label>
                <input name="pekerjaan_wali" class="form-control mb-3">
            </div>

        </div>

        <button type="button" class="btn btn-secondary mt-3" onclick="switchToSiswa()">
            ← Kembali ke Data Siswa
        </button>

        <button class="btn btn-primary mt-3 ms-2">
            Simpan Data
        </button>

    </div>

</div>

</form>
</div>