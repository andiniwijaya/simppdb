<?php $base = Config::base_url(); ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lupa Password</title>

<link rel="stylesheet" href="<?= $base ?>/public/assets/css/forgot_password.css">

</head>
<body>

<div class="auth-container">

    <h2>Lupa Password</h2>

    <form action="/forgot" method="POST">
        <input type="email" name="email" placeholder="Masukkan email kamu" required>
        <button type="submit">Kirim Link Reset</button>
    </form>

    <a href="<?= $base ?>/login">Kembali ke Login</a>

</div>

</body>
</html>
