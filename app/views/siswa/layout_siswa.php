<?php $base = Config::base_url(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Siswa PPDB</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<link rel="stylesheet" href="<?= $base ?>/public/assets/css/dashboard_siswa.css">
</head>

<body>

<?php include __DIR__."/sidebar.php"; ?>

<div class="content px-4 py-4">
    <?= $content ?>
</div>

</body>
</html>
