<?php
// Header minimal para Security module
if (!isset($baseUrl)) $baseUrl = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
?><!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Security - <?php echo $_GET['page'] ?? 'Home'; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Módulo Security - DWES</h1>
    <nav>
        <a href="index.php">Home</a>
        <?php if (empty($_SESSION['user'])): ?>
            <a href="index.php?page=register">Registro</a>
            <a href="index.php?page=login">Login</a>
        <?php else: ?>
            <span>Bienvenido <?php echo htmlspecialchars($_SESSION['user']['name']); ?> (<?php echo $_SESSION['user']['role']; ?>)</span>
            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                <a href="index.php?page=admin">Admin</a>
            <?php endif; ?>
            <?php if (in_array($_SESSION['user']['role'], ['admin', 'editor'])): ?>
                <a href="index.php?page=editor">Editor</a>
            <?php endif; ?>
            <a href="index.php?page=usuario">Mi cuenta</a>
            <a href="index.php?page=logout">Logout</a>
            <a href="index.php?reset=1">Reiniciar</a>
        <?php endif; ?>
    </nav>
</header>
<main class="container">
