<?php
// Punto de entrada público para Unit-04 sesiones
// Ruteo muy simple basado en ?page=contador|usuario|sesion

// Rutas base
$baseSrc = __DIR__ . '/../src';

// Mapear páginas a controladores
$routes = [
    'contador' => $baseSrc . '/controllers/ContadorController.php',
    'usuario'  => $baseSrc . '/controllers/UsuarioController.php',
    'sesion'   => $baseSrc . '/controllers/SesionController.php',
];

// Página por defecto
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if ($page === 'home') {
    // Calcular base URL relativa para recursos (evita rutas absolutas que no coinciden con el document root)
    $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
    if ($baseUrl === '/' || $baseUrl === '\\') {
        $baseUrl = '';
    }

    // Construir href del CSS de forma robusta: si $baseUrl está vacío usamos ruta relativa
    $assetsHref = ($baseUrl === '') ? 'assets/css/style.css' : $baseUrl . '/assets/css/style.css';

    // Mostrar índice simple con tarjetas
    ?>
    <!doctype html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Unit 04 - Sesiones</title>
        <link rel="stylesheet" href="<?php echo $assetsHref; ?>">
    </head>
    <body>
        <main class="container">
            <h1>Unit 04 - Sesiones</h1>
            <p>Selecciona una página:</p>
            <div class="grid">
                <div class="card">
                    <h3>Contador de visitas</h3>
                    <p>Cuenta las visitas en la misma sesión del navegador.</p>
                    <a class="btn" href="?page=contador">Abrir</a>
                </div>
                <div class="card">
                    <h3>Guardar nombre</h3>
                    <p>Formulario para guardar el nombre del usuario en sesión.</p>
                    <a class="btn" href="?page=usuario">Abrir</a>
                </div>
                <div class="card">
                    <h3>Sesión activa</h3>
                    <p>Muestra desde cuándo está activa la sesión.</p>
                    <a class="btn" href="?page=sesion">Abrir</a>
                </div>
            </div>
        </main>
    </body>
    </html>
    <?php
    exit;
}

// Si la ruta existe, incluir el controlador
if (isset($routes[$page]) && file_exists($routes[$page])) {
    include $routes[$page];
    // Cada controlador se encargará de iniciar la sesión y renderizar
    exit;
}

// Página no encontrada
http_response_code(404);
echo "<h1>404 - Página no encontrada</h1>";
exit;

