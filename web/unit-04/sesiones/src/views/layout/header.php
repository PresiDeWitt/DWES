<?php
// Header de las vistas - recibe un título opcional
if (!isset($title)) $title = 'Unit 04 - Sesiones';
// Forzar rutas relativas (evitar barras iniciales que causan path absolutos)
$assetsHref = 'assets/css/style.css';
$linkPrefix = ''; // usamos siempre rutas relativas respecto a este front controller

// Calcular un enlace relativo al índice general (web/index.php) para evitar usar rutas absolutas
$scriptDir = dirname($_SERVER['SCRIPT_NAME']);
$trim = trim($scriptDir, '/\\');
if ($trim === '') {
    $rootLink = 'index.php';
} else {
    $parts = explode('/', $trim);
    $rootLink = str_repeat('../', count($parts)) . 'index.php';
}
?><!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($assetsHref); ?>">
</head>
<body>
<header class="site-header">
    <h1><?php echo htmlspecialchars($title); ?></h1>
    <nav class="nav">
        <a href="<?php echo htmlspecialchars($linkPrefix); ?>index.php">Índice</a>
        <a href="<?php echo htmlspecialchars($linkPrefix); ?>index.php?page=contador">Contador</a>
        <a href="<?php echo htmlspecialchars($linkPrefix); ?>index.php?page=usuario">Guardar nombre</a>
        <a href="<?php echo htmlspecialchars($linkPrefix); ?>index.php?page=sesion">Sesión activa</a>
        <a href="<?php echo htmlspecialchars($rootLink); ?>">Volver al índice general</a>
    </nav>
    <hr>
</header>
<main class="container">
