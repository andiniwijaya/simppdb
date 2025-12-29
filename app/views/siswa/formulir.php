<?php 
$active = "formulir"; 
$base = Config::base_url();
?>

<body class="formulir-page">

<div class="content">

    <!-- JUDUL -->
    <h3 class="mb-4 fw-bold">
        <i class="bi bi-pencil-square"></i> Formulir PPDB
    </h3>

    <!-- PROGRESS -->
    <div class="progress-card">
        <h6 class="fw-semibold mb-2">
            <i class="bi bi-graph-up"></i> Progress Pengisian
        </h6>
        <div class="progress mb-2">
            <div class="progress-bar" style="width:40%"></div>
        </div>
        <small class="text-muted">
            Lengkapi semua bagian hingga 100%.
        </small>
    </div>

    <!-- TAB -->
    <ul class="nav nav-tabs" id="formTabs">
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

        <!-- ================= TAB DATA SISWA ================= -->
        <div class="tab-pane fade <?= ($_GET['tab']??'siswa')=='siswa'?'show active':'' ?>"
             id="tabSiswa">

            <form action="/siswa/formulir/simpan" method="post">
                <input type="hidden" name="save" value="siswa">

                <div class="form-card">
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
                                <option></option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Agama</label>
                            <select name="agama" class="form-select" required>
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
                </div>

                <button class="btn btn-primary w-100 mt-4 mb-5">
                    Simpan Data Diri
                </button>
            </form>
        </div>

        <!-- ================= TAB ORANG TUA ================= -->
        <div class="tab-pane fade <?= ($_GET['tab'] ?? '') == 'ortu' ? 'show active' : '' ?>"
             id="tabOrtu">

            <form action="/siswa/formulir/simpan" method="post">
                <input type="hidden" name="save" value="ortu">

                <div class="form-card">
                    <h5 class="mb-3 fw-bold">Data Orang Tua</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Nama Ayah</label>
                            <input name="nama_ayah" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nama Ibu</label>
                            <input name="nama_ibu" class="form-control" required>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary w-100 mt-4 mb-5">
                    Simpan Data Orang Tua
                </button>
            </form>
        </div>

        <!-- ================= TAB WALI ================= -->
        <div class="tab-pane fade <?= ($_GET['tab'] ?? '') == 'wali' ? 'show active' : '' ?>"
             id="tabWali">

            <form action="/siswa/formulir/simpan" method="post">
                <input type="hidden" name="save" value="wali">

                <div class="form-card">
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
                    </div>
                </div>

                <button class="btn btn-primary w-100 mt-4 mb-5">
                    Simpan Data Wali
                </button>
            </form>
        </div>

    </div>
</div>

</body>
