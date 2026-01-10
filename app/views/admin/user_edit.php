<h4>Edit User</h4>

<form action="/dashboard/updateUser" method="post">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <div class="mb-3">
        <label>Nama Pengguna</label>
        <input type="text"
               name="nama"
               class="form-control"
               value="<?= htmlspecialchars($data['nama']) ?>"
               required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email"
               name="email"
               class="form-control"
               value="<?= htmlspecialchars($data['email']) ?>"
               required>
    </div>

    <div class="mb-3">
        <label>Kata Sandi Baru</label>
        <input type="password"
               name="kata_sandi"
               class="form-control"
               placeholder="Kosongkan jika tidak diubah">
        <small class="text-muted">
            Biarkan kosong jika tidak ingin mengganti password
        </small>
    </div>

    <div class="mb-3">
        <label>Dibuat Pada</label>
        <input type="text"
               class="form-control"
               value="<?= $data['created_at'] ?>"
               disabled>
    </div>

    <button type="submit" class="btn btn-primary">
        Simpan Perubahan
    </button>

    <a href="/dashboard/users" class="btn btn-secondary">
        Kembali
    </a>
</form>
