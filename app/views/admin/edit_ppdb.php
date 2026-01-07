<link rel="stylesheet" href="/public/css/admin_ppdb_form.css">
<h2>Edit Data PPDB</h2>

<div class="pengaturan-wrapper">

<form method="post" action="/admin/ppdb/update?id=<?= $data['id_pendaftar'] ?>">

    <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text"
               name="nama_lengkap"
               value="<?= htmlspecialchars($data['nama_lengkap']) ?>"
               class="form-control"
               required>
    </div>

    <div class="form-group">
        <label>NISN</label>
        <input type="text"
               name="nisn"
               value="<?= htmlspecialchars($data['nisn']) ?>"
               class="form-control"
               required>
    </div>

    <div class="form-group">
        <label>Asal Sekolah</label>
        <input type="text"
               name="asal_sekolah"
               value="<?= htmlspecialchars($data['asal_sekolah']) ?>"
               class="form-control"
               required>
    </div>

    <div class="form-group">
        <label>Status Data</label>
        <select name="status_data" class="form-control">
            <option value="baru" <?= $data['status_data']=='baru'?'selected':'' ?>>Baru</option>
            <option value="lengkap" <?= $data['status_data']=='lengkap'?'selected':'' ?>>Lengkap</option>
            <option value="ditolak" <?= $data['status_data']=='ditolak'?'selected':'' ?>>Ditolak</option>
        </select>
    </div>

    <br>

    <button type="submit" class="btn btn-primary">
        Simpan Perubahan
    </button>

    <a href="/dashboard/data_ppdb" class="btn btn-secondary">
        Kembali
    </a>

</form>

</div>
