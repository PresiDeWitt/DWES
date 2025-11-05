<?php
// db_init.php - crear la base de datos SQLite y un usuario admin por defecto
$cfg = require __DIR__ . '/config.php';
$dbPath = $cfg['db_path'];
$dir = dirname($dbPath);
if (!is_dir($dir)) mkdir($dir, 0755, true);
$pdo = new PDO('sqlite:' . $dbPath);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password_hash TEXT NOT NULL,
    role TEXT NOT NULL DEFAULT 'usuario',
    phone_encrypted TEXT,
    created_at TEXT NOT NULL
)");

// Crear usuario admin por defecto si no existe
$adminEmail = 'admin@example.com';
$stmt = $pdo->prepare('SELECT id FROM users WHERE email = :email');
$stmt->execute([':email' => $adminEmail]);
if (!$stmt->fetch()) {
    $passwordHash = password_hash('admin123', PASSWORD_DEFAULT);
    $name = 'Administrador';
    $role = 'admin';
    $created = date('c');
    $stmt = $pdo->prepare('INSERT INTO users (name,email,password_hash,role,created_at) VALUES (:name,:email,:ph,:role,:created)');
    $stmt->execute([
        ':name' => $name,
        ':email' => $adminEmail,
        ':ph' => $passwordHash,
        ':role' => $role,
        ':created' => $created
    ]);
    echo "Usuario admin creado: $adminEmail / admin123\n";
} else {
    echo "Usuario admin ya existente: $adminEmail\n";
}

echo "Base de datos inicializada en: $dbPath\n";

