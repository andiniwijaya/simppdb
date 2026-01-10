<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">✏️ Edit User</h5>
                </div>

                <div class="card-body">
                    <form action="/dashboard/updateUser" method="post">
                        <input type="hidden" name="id" value="<?= $data['id_pengguna'] ?>">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Pengguna</label>
                            <input type="text"
                                   name="nama_pengguna"
                                   class="form-control"
                                   value="<?= htmlspecialchars($data['nama_pengguna']) ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="<?= htmlspecialchars($data['email']) ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kata Sandi Baru</label>
                            <input type="password"
                                   name="kata_sandi"
                                   class="form-control"
                                   placeholder="Kosongkan jika tidak diubah">
                            <small class="text-muted">
                                Biarkan kosong jika tidak ingin mengganti password
                            </small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Dibuat Pada</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= $data['dibuat_pada'] ?>"
                                   disabled>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/dashboard/users" class="btn btn-secondary">
                                ← Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                💾 Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
