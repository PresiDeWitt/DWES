<?php
// SesionController.php
// Controlador para mostrar desde cuándo está activa la sesión

session_start();

$viewDir = __DIR__ . '/../views/';
// Calcular baseUrl y prefijo de redirección de forma robusta
$baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
if ($baseUrl === '/' || $baseUrl === '\\') $baseUrl = '';
$redirectPrefix = ($baseUrl === '') ? '' : $baseUrl . '/';

// Reiniciar sesión si se solicita
if (isset($_GET['reset'])) {
    // Limpiar datos y cookie de sesión
    session_unset();
    session_destroy();
    setcookie(session_name(), '', time() - 42000, '/');
    // Redirigir al front controller del módulo (índice público)
    header('Location: ' . $redirectPrefix . 'index.php');
    exit;
}

if (!isset($_SESSION['inicio'])) {
    $_SESSION['inicio'] = time();
}

include $viewDir . 'layout/header.php';
include $viewDir . 'sesionActiva.php';
include $viewDir . 'layout/footer.php';
