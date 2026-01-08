<?php $base = Config::base_url(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    <!-- CSS GLOBAL -->
    <link rel="stylesheet" href="<?= $base ?>/public/assets/css/admin.css">

    <!-- CSS KHUSUS PPDB -->
    <link rel="stylesheet" href="<?= $base ?>/public/assets/css/edit_ppdb.css">

    <!-- ICON -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>

    <?php include "sidebar.php"; ?>

    <div class="content">
        <?php require $content; ?>
    </div>

</body>
</html>
