<?php
// ContadorController.php
// Controlador para el contador de visitas

session_start();

$viewDir = __DIR__ . '/../views/';
// Calcular baseUrl y prefijo de redirección de forma robusta
$baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
if ($baseUrl === '/' || $baseUrl === '\\') $baseUrl = '';
$redirectPrefix = ($baseUrl === '') ? '' : $baseUrl . '/';

// Reiniciar si se solicita
if (isset($_GET['reset'])) {
    // Limpiar datos y cookie de sesión
    session_unset();
    session_destroy();
    setcookie(session_name(), '', time() - 42000, '/');
    // Redirigir al front controller del módulo
    header('Location: ' . $redirectPrefix . 'index.php?page=contador');
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
