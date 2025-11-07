<?php
session_start();
require __DIR__ . '/../src/helpers.php';

// Ruta base para las vistas
$viewDir = __DIR__ . '/../src/views/';

$page = $_GET['page'] ?? 'home';

// Reset sesión
if (isset($_GET['reset'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

// Logout
if ($page === 'logout') {
    session_destroy();
    header('Location: index.php');
    exit;
}

// Registro
if ($page === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $errors = [];

    if (!$name) $errors[] = 'Nombre requerido';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email no válido';
    if (strlen($password) < 6) $errors[] = 'Contraseña mínimo 6 caracteres';
    if (findUser($email)) $errors[] = 'Email ya registrado';

    if (!$errors) {
        $_SESSION['user'] = ['name' => $name, 'email' => $email, 'role' => 'usuario'];
        header('Location: index.php');
        exit;
    }
}

// Login
if ($page === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $errors = [];

    $user = findUser($email);
    if ($user && $user['password'] === $password) {
        $_SESSION['user'] = ['id' => $user['id'], 'name' => $user['name'], 'email' => $user['email'], 'role' => $user['role']];
        header('Location: index.php');
        exit;
    } else {
        $errors[] = 'Email o contraseña incorrectos';
    }
}

// Renderizar vista
include $viewDir . 'layout/header.php';

switch ($page) {
    case 'register':
        include $viewDir . 'register.php';
        break;
    case 'login':
        include $viewDir . 'login.php';
        break;
    case 'admin':
        if (empty($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            echo '<p class="error">Acceso denegado</p>';
        } else {
            include $viewDir . 'admin.php';
        }
        break;
    case 'editor':
        if (empty($_SESSION['user']) || !in_array($_SESSION['user']['role'], ['admin', 'editor'])) {
            echo '<p class="error">Acceso denegado</p>';
        } else {
            include $viewDir . 'editor.php';
        }
        break;
    case 'usuario':
        if (empty($_SESSION['user'])) {
            echo '<p class="error">Debes estar logueado</p>';
        } else {
            include $viewDir . 'usuario.php';
        }
        break;
    default:
        include $viewDir . 'home.php';
}

include $viewDir . 'layout/footer.php';
