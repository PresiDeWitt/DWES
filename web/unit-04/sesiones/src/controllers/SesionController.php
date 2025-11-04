<?php
// SesionController.php
// Controlador para mostrar desde cuándo está activa la sesión

session_start();

$viewDir = __DIR__ . '/../views/';
$baseUrl = dirname($_SERVER['PHP_SELF']);

// Reiniciar sesión si se solicita
if (isset($_GET['reset'])) {
    session_unset();
    session_destroy();
    header('Location: ' . $baseUrl . '/index.php?page=sesion');
    exit;
}

if (!isset($_SESSION['inicio'])) {
    $_SESSION['inicio'] = time();
}

include $viewDir . 'layout/header.php';
include $viewDir . 'sesionActiva.php';
include $viewDir . 'layout/footer.php';
