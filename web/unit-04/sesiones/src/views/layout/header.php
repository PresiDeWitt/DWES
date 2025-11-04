<?php
// Header de las vistas - recibe un título opcional
if (!isset($title)) $title = 'Unit 04 - Sesiones';
// Si el controlador ya define $baseUrl, úsalo; si no, calculamos uno relativo
if (!isset($baseUrl)) {
    // Usar SCRIPT_NAME para obtener una ruta más estable
    $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
}
?><!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($baseUrl); ?>/css/style.css">
</head>
<body>
<header class="site-header">
    <h1><?php echo htmlspecialchars($title); ?></h1>
    <nav class="nav">
        <a href="<?php echo htmlspecialchars($baseUrl); ?>/index.php">Índice</a>
        <a href="<?php echo htmlspecialchars($baseUrl); ?>/index.php?page=contador">Contador</a>
        <a href="<?php echo htmlspecialchars($baseUrl); ?>/index.php?page=usuario">Guardar nombre</a>
        <a href="<?php echo htmlspecialchars($baseUrl); ?>/index.php?page=sesion">Sesión activa</a>
        <a href="/index.php">Volver al índice general</a>
    </nav>
    <hr>
</header>
<main class="container">
