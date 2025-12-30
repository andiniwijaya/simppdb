<?php 
$base = Config::base_url(); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Siswa | PPDB Online</title>

<!-- BOOTSTRAP CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">

<!-- ICONS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
rel="stylesheet">

<!-- SIDEBAR & DASHBOARD STYLE -->
<link rel="stylesheet" href="<?= $base ?>/public/assets/css/dashboard_siswa.css">

<!-- FORMULIR PAGE CSS -->
<?php if(str_contains($_SERVER["REQUEST_URI"], "/formulir")): ?>
<link rel="stylesheet" href="<?= $base ?>/public/assets/css/formulir.css">
<?php endif; ?>

</head>

<body>

<!-- SIDEBAR -->
<?php include __DIR__ . "/sidebar.php"; ?>

<!-- MAIN CONTENT -->
<div class="container-fluid p-0">
    <?= $content ?>
</div>


<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
</script>

<!-- FORM JS -->
<?php if(str_contains($_SERVER["REQUEST_URI"], "/formulir")): ?>
<script src="<?= $base ?>/public/assets/js/formulir.js"></script>
<?php endif; ?>

</body>
</html>
