<?php $base = Config::base_url(); ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Siswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<!-- panggil css siswa -->
<link rel="stylesheet" href="<?= Config::base_url(); ?>/public/assets/css/dashboard_siswa.css">


</head>

<body>

<?php include "sidebar.php"; ?>

<div class="content">
    <?php include $content; ?>
</div>

</body>
</html>
