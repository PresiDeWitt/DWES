<?php
// Front controller simple para el módulo Security
session_start();
require __DIR__ . '/../../src/config.php';
require __DIR__ . '/../../src/helpers.php';

// Ruta base para las vistas
$viewDir = __DIR__ . '/../../src/views/';

// Manejo de rutas muy simple mediante ?page=
$page = $_GET['page'] ?? 'home';

// Logout
if ($page === 'logout') {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
}

// Registro
if ($page === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $phone = trim($_POST['phone'] ?? '');
    $errors = [];
    if ($name === '') $errors[] = 'Introduce el nombre';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email no válido';
    if (strlen($password) < 6) $errors[] = 'Contraseña de al menos 6 caracteres';

    if (empty($errors)) {
        $pdo = getPdo();
        // comprobar que email no existe
        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = :email');
        $stmt->execute([':email' => $email]);
        if ($stmt->fetch()) {
            $errors[] = 'El correo ya está registrado';
        } else {
            $ph = password_hash($password, PASSWORD_DEFAULT);
            $phone_enc = $phone !== '' ? encryptPhone($phone) : null;
            $stmt = $pdo->prepare('INSERT INTO users (name,email,password_hash,role,phone_encrypted,created_at) VALUES(:name,:email,:ph,:role,:phone,:created)');
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':ph' => $ph,
                ':role' => 'usuario',
                ':phone' => $phone_enc,
                ':created' => date('c')
            ]);
            $_SESSION['user'] = ['name' => $name, 'email' => $email, 'role' => 'usuario'];
            header('Location: index.php');
            exit;
        }
    }
}

// Login
if ($page === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $errors = [];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email no válido';
    if ($password === '') $errors[] = 'Introduce la contraseña';
    if (empty($errors)) {
        $pdo = getPdo();
        $stmt = $pdo->prepare('SELECT id,name,email,password_hash,role FROM users WHERE email = :email');
        $stmt->execute([':email' => $email]);
        $u = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($u && password_verify($password, $u['password_hash'])) {
            // Login correcto
            $_SESSION['user'] = ['id' => $u['id'], 'name' => $u['name'], 'email' => $u['email'], 'role' => $u['role']];
            header('Location: index.php');
            exit;
        } else {
            $errors[] = 'Credenciales incorrectas';
        }
    }
}

// Para construir rutas en enlaces en las vistas
$baseUrl = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

// Renderizar vista
switch ($page) {
    case 'register':
        include $viewDir . 'layout/header.php';
        include $viewDir . 'register.php';
        include $viewDir . 'layout/footer.php';
        break;
    case 'login':
        include $viewDir . 'layout/header.php';
        include $viewDir . 'login.php';
        include $viewDir . 'layout/footer.php';
        break;
    case 'admin':
        include $viewDir . 'layout/header.php';
        include $viewDir . 'admin.php';
        include $viewDir . 'layout/footer.php';
        break;
    case 'editor':
        include $viewDir . 'layout/header.php';
        include $viewDir . 'editor.php';
        include $viewDir . 'layout/footer.php';
        break;
    case 'usuario':
        include $viewDir . 'layout/header.php';
        include $viewDir . 'usuario.php';
        include $viewDir . 'layout/footer.php';
        break;
    default:
        include $viewDir . 'layout/header.php';
        include $viewDir . 'home.php';
        include $viewDir . 'layout/footer.php';
        break;
}

