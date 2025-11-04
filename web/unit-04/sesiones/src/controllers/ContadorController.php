<?php
// ContadorController.php
// Controlador para el contador de visitas

session_start();

$viewDir = __DIR__ . '/../views/';
$baseUrl = dirname($_SERVER['PHP_SELF']);

// Reiniciar si se solicita
if (isset($_GET['reset'])) {
    session_unset();
    session_destroy();
    // Redirigir de forma relativa al front controller del módulo
    header('Location: index.php?page=contador');
    exit;
}

if (!isset($_SESSION['visitas'])) {
    $_SESSION['visitas'] = 1;
    $first = true;
} else {
    $_SESSION['visitas']++;
    $first = false;
}

include $viewDir . 'layout/header.php';
include $viewDir . 'contadorVisitas.php';
include $viewDir . 'layout/footer.php';
