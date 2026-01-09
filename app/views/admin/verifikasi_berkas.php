<?php
// Tampilkan pesan sukses/error jika ada
if (isset($_SESSION['success'])) {
    echo '<div style="color: green; margin-bottom: 10px;">' . htmlspecialchars($_SESSION['success']) . '</div>';
    unset($_SESSION['success']);  // Hapus session agar tidak muncul lagi
}
if (isset($_SESSION['error'])) {
    echo '<div style="color: red; margin-bottom: 10px;">' . htmlspecialchars($_SESSION['error']) . '</div>';
    unset($_SESSION['error']);  // Hapus session agar tidak muncul lagi
}
?>

<h2>Verifikasi Berkas Siswa</h2>

<?php if (empty($list)): ?>
    <p>Tidak ada berkas yang perlu diverifikasi.</p>
<?php else: ?>
    <table class="pengaturan-table">
    <tr>
        <th>Nama</th>
        <th>Jenis Berkas</th>
        <th>File</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($list as $b): ?>
    <tr>
        <td><?= htmlspecialchars($b['nama_lengkap']) ?></td>
        <td><?= htmlspecialchars($b['jenis_berkas']) ?></td>
        <td>
            <a href="<?= htmlspecialchars($b['lokasi_berkas']) ?>" target="_blank">Lihat</a>
        </td>
        <td><?= htmlspecialchars($b['status_berkas']) ?></td>
        <td>
            <?php if ($b['status_berkas'] !== 'valid'): ?>
                <a href="/dashboard/validBerkas?id=<?= htmlspecialchars($b['id_berkas']) ?>" onclick="return confirm('Apakah Anda yakin ingin memvalidasi berkas ini?')">✔ Valid</a> |
                <a href="/dashboard/invalidBerkas?id=<?= htmlspecialchars($b['id_berkas']) ?>" onclick="return confirm('Apakah Anda yakin ingin menandai berkas ini sebagai invalid?')">✖ Invalid</a>
            <?php else: ?>
                ✔ Valid
            <?php endif ?>
        </td>
    </tr>
    <?php endforeach ?>
    </table>
<?php endif ?>