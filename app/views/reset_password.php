<?php $base = Config::base_url(); ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Reset Password</title>

<link rel="stylesheet" href="<?= $base ?>/public/assets/css/reset_password.css">

</head>
<body>

<div class="reset-wrapper">

    <div class="reset-box">

        <h2>Reset Password Baru</h2>

        <form action="/reset" method="POST">

            <input type="password" name="password" placeholder="Password Baru" required>

            <input type="password" name="confirm" placeholder="Ulangi Password" required>

            <button type="submit">Simpan Password Baru</button>

        </form>

    </div>

</div>

</body>
</html>
