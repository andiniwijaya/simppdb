<?php $base = Config::base_url(); ?>

<h2 style="margin-bottom:20px; font-weight:700;">Pengaturan Sistem</h2>

<div class="pengaturan-wrapper">

    <!-- NAV TAB -->
    <ul class="pengaturan-nav">
        <li class="active" data-target="profil_admin">Profil Admin</li>
        <li data-target="password_admin">Ganti Password</li>
        <li data-target="identitas_sekolah">Identitas Sekolah</li>
    </ul>

    <div class="pengaturan-content">

        <!-- PROFIL ADMIN -->
        <div class="pengaturan-page show" id="profil_admin">
            <table class="pengaturan-table">
                <tr><th>Nama Admin</th><td>Administrator</td></tr>
                <tr><th>Username</th><td>admin</td></tr>
                <tr><th>Email Admin</th><td>admin@gmail.com</td></tr>
            </table>
        </div>

        <div class="pengaturan-page" id="password_admin">

    <form method="POST" action="<?= $base ?>/dashboard/changePassword">

        <table class="pengaturan-table">

            <tr>
                <th>Password Baru</th>
                <td>
                    <input type="password" name="password" required class="form-control">
                </td>
            </tr>

            <tr>
                <th>Konfirmasi Password</th>
                <td>
                    <input type="password" name="confirm" required class="form-control">
                </td>
            </tr>

        </table>

        <button type="submit" class="btn btn-primary mt-3">Update Password</button>

    </form>

</div>


        <!-- IDENTITAS SEKOLAH -->
        <div class="pengaturan-page" id="identitas_sekolah">
            <table class="pengaturan-table">
                <tr><th>Nama Sekolah</th><td>SMP PGRI Arjasari</td></tr>
                <tr><th>Alamat</th><td>Jl. Raya Arjasari No.10</td></tr>
            </table>
        </div>

    </div>

</div>

<script src="<?= $base ?>/public/assets/js/pengaturan.js"></script>
