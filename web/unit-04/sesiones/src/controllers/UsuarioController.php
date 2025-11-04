<?php
// UsuarioController.php
// Controlador para guardar/mostrar el nombre de usuario en sesión

session_start();

$viewDir = __DIR__ . '/../views/';
$baseUrl = dirname($_SERVER['PHP_SELF']);

// Manejar logout/olvido
if (isset($_GET['logout'])) {
    unset($_SESSION['usuario_nombre']);
    // Redirigir de forma relativa al front controller del módulo
    header('Location: index.php?page=usuario');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'])) {
    $nombre = trim((string)$_POST['nombre']);
    if ($nombre !== '') {
        // Guardar nombre escapado
        $_SESSION['usuario_nombre'] = htmlspecialchars($nombre, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        header('Location: index.php?page=usuario');
        exit;
    }
}

include $viewDir . 'layout/header.php';
include $viewDir . 'guardarNombreUser.php';
include $viewDir . 'layout/footer.php';

