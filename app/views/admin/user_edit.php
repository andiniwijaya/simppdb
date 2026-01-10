<h4 class="mb-3">✏️ Edit User</h4>

<form action="/dashboard/updateUser" method="post">
    <input type="hidden" name="id" value="<?= $data['id_pengguna'] ?>">

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <tbody>
                <tr>
                    <th width="30%">Nama Pengguna</th>
                    <td>
                        <input type="text"
                               name="nama_pengguna"
                               class="form-control"
                               value="<?= htmlspecialchars($data['nama_pengguna']) ?>"
                               required>
                    </td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="<?= htmlspecialchars($data['email']) ?>"
                               required>
                    </td>
                </tr>

                <tr>
                    <th>Kata Sandi Baru</th>
                    <td>
                        <input type="password"
                               name="kata_sandi"
                               class="form-control"
                               placeholder="Kosongkan jika tidak diubah">
                        <small class="text-muted">
                            Biarkan kosong jika tidak ingin mengganti password
                        </small>
                    </td>
                </tr>

                <tr>
                    <th>Dibuat Pada</th>
                    <td>
                        <input type="text"
                               class="form-control"
                               value="<?= $data['dibuat_pada'] ?>"
                               disabled>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <a href="/dashboard/users" class="btn btn-secondary">
            ← Kembali
        </a>
        <button type="submit" class="btn btn-primary">
            💾 Simpan Perubahan
        </button>
    </div>
</form>
