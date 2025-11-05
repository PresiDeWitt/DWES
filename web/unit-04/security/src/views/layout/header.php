<?php
// Header minimal para Security module
if (!isset($baseUrl)) $baseUrl = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
?><!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Security - <?php echo isset($title) ? htmlspecialchars($title) : 'Módulo'; ?></title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($baseUrl); ?>/css/style.css">
</head>
<body>
<header class="sec-header">
    <div class="container">
        <h1>Security - DWES</h1>
        <nav>
            <a href="<?php echo htmlspecialchars($baseUrl); ?>/index.php">Home</a>
            <?php if (empty($_SESSION['user'])): ?>
                <a href="<?php echo htmlspecialchars($baseUrl); ?>/index.php?page=register">Registro</a>
                <a href="<?php echo htmlspecialchars($baseUrl); ?>/index.php?page=login">Login</a>
            <?php else: ?>
                <span>Hola, <?php echo htmlspecialchars($_SESSION['user']['name']); ?></span>
                <?php if ($_SESSION['user']['role'] === 'admin'): ?> <a href="<?php echo htmlspecialchars($baseUrl); ?>/index.php?page=admin">Admin</a><?php endif; ?>
                <?php if (in_array($_SESSION['user']['role'], ['admin','editor'])): ?> <a href="<?php echo htmlspecialchars($baseUrl); ?>/index.php?page=editor">Editor</a><?php endif; ?>
                <a href="<?php echo htmlspecialchars($baseUrl); ?>/index.php?page=usuario">Mi cuenta</a>
                <a href="<?php echo htmlspecialchars($baseUrl); ?>/index.php?page=logout">Logout</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
<main class="container">

