<?php
// public/includes/header.php
require_once __DIR__ . '/../../src/config.php';
if (!isset($pageTitle)) {
    $pageTitle = APP_NAME;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <?php
    // Determinar la ruta base de la URL actual para enlazar assets correctamente
    $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    if ($base === '' || $base === '/') {
        $assetsHref = '/assets/css/style.css';
    } else {
        $assetsHref = $base . '/assets/css/style.css';
    }
    ?>
    <link rel="stylesheet" href="<?php echo $assetsHref; ?>">
</head>
<body>

<main class="container">
