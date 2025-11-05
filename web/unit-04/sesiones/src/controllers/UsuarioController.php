<?php
// UsuarioController.php
// Controlador para guardar/mostrar el nombre de usuario en sesión

session_start();

$viewDir = __DIR__ . '/../views/';
// Calcular baseUrl y prefijo de redirección de forma robusta
$baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
if ($baseUrl === '/' || $baseUrl === '\\') $baseUrl = '';
$redirectPrefix = ($baseUrl === '') ? '' : $baseUrl . '/';

// Manejar logout/olvido
if (isset($_GET['logout'])) {
    unset($_SESSION['usuario_nombre']);
    // Redirigir al front controller del módulo
    header('Location: ' . $redirectPrefix . 'index.php?page=usuario');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'])) {
    $nombre = trim((string)$_POST['nombre']);
    if ($nombre !== '') {
        // Guardar nombre escapado
        $_SESSION['usuario_nombre'] = htmlspecialchars($nombre, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        header('Location: ' . $redirectPrefix . 'index.php?page=usuario');
        exit;
    }
}

include $viewDir . 'layout/header.php';
include $viewDir . 'guardarNombreUser.php';
include $viewDir . 'layout/footer.php';
