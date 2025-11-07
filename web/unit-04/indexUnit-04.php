<?php
// indexUnit-04.php - Índice de Unit-04 (muestra Sesiones y Seguridad)

$tasks = [
    'sesiones' => [
        'name' => 'Sesiones y Cookies',
        'path' => 'sesiones/public/',
        'url' => 'sesiones/public/',
        'description' => 'Ejercicios de sesiones: contador, guardar nombre, sesión activa'
    ],
    'cookies2' => [
        'name' => 'Sesiones y Cookies II',
        'path' => 'cookies2/public/',
        'url' => 'cookies2/public/',
        'description' => 'Carrito de compras, preferencias de usuario y temporizador de sesión'
    ],
    'security' => [
        'name' => 'Seguridad',
        'path' => 'security/public/',
        'url' => 'security/public/',
        'description' => 'Registro/login, roles y cifrado de datos sensibles (módulo Security)'
    ],
];

function taskExists($path) {
    return is_dir(__DIR__ . '/' . $path) && file_exists(__DIR__ . '/' . $path . 'index.php');
}

?><!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Unit 04 - Índice</title>
    <link rel="stylesheet" href="../assets/css/styleHome.css">
    <style>
        body{font-family:Arial,Helvetica,sans-serif;margin:18px;background:#f7f7f8}
        .wrap{max-width:960px;margin:0 auto}
        .grid{display:flex;gap:16px;flex-wrap:wrap}
        .card{background:#fff;border:1px solid #e6e6e6;padding:14px;border-radius:8px;width:320px}
        .card h3{margin:0 0 8px}
        .card p{margin:0 0 12px;color:#444}
        .actions a{display:inline-block;padding:8px 12px;border-radius:6px;background:#2d6cdf;color:#fff;text-decoration:none}
        .meta{font-size:.85rem;color:#666;margin-top:10px}
    </style>
</head>
<body>
<main class="wrap">
    <h1>Unit 04 - Seguridad, Sesiones y Cookies</h1>
    <p>Selecciona una página:</p>

    <section class="grid">
        <?php foreach($tasks as $key => $t):
            $exists = taskExists($t['path']); ?>
            <article class="card">
                <h3><?php echo htmlspecialchars($t['name']); ?></h3>
                <p><?php echo htmlspecialchars($t['description']); ?></p>
                <div class="actions">
                    <?php if ($exists): ?>
                        <a href="<?php echo htmlspecialchars($t['url']); ?>">Abrir módulo</a>
                    <?php else: ?>
                        <span style="color:#999">No disponible</span>
                    <?php endif; ?>
                </div>
                <div class="meta">Ruta: <code><?php echo htmlspecialchars($t['path']); ?></code></div>
            </article>
        <?php endforeach; ?>
    </section>
</main>
<p style="margin-top:16px;"><a href="../index.php">← Volver</a></p>

</body>
</html>