<?php
/**
 * index.php - Punto de entrada principal
 */

require __DIR__ . '/../src/config.php';

$titulo = 'Cookies y Sesiones II - Unit 04';

$page = $_GET['page'] ?? 'home';

$rutas = [
    'ejercicio1' => __DIR__ . '/../src/views/ejercicio1.php',
    'ejercicio2' => __DIR__ . '/../src/views/ejercicio2.php',
    'ejercicio3' => __DIR__ . '/../src/views/ejercicio3.php',
];

if ($page === 'home') {
    $modo_actual = $_COOKIE['modo_visualizacion'] ?? 'claro';
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
        <title><?php echo htmlspecialchars($titulo); ?></title>
        <style>
            body {
                font-family: Arial;
                margin: 20px;
            }

            body.modo-oscuro {
                background-color: black;
                color: white;
            }

            table {
                border-collapse: collapse;
            }

            th, td {
                padding: 5px;
                border: 1px solid black;
            }

            body.modo-oscuro th,
            body.modo-oscuro td {
                border-color: white;
            }

            input {
                padding: 3px;
            }

            button {
                padding: 5px 10px;
            }
        </style>
    </head>
    <body class="modo-<?php echo htmlspecialchars($modo_actual); ?>">
        <div>
            <h1>Cookies y Sesiones II</h1>
            <p>Ejercicios prácticos de PHP</p>

            <hr>

            <h3>Ejercicio 1 - Carrito de Compras</h3>
            <p>Usa sesiones para almacenar productos.</p>
            <a href="?page=ejercicio1">Abrir</a>

            <h3>Ejercicio 2 - Preferencias</h3>
            <p>Usa cookies para guardar modo claro/oscuro.</p>
            <a href="?page=ejercicio2">Abrir</a>

            <h3>Ejercicio 3 - Timeout</h3>
            <p>Cierre automatico por inactividad.</p>
            <a href="?page=ejercicio3">Abrir</a>

            <hr>
            <p><a href="../../indexUnit-04.php">Volver</a></p>
        </div>
    </body>
    </html>
    <?php
    exit;
}

if (isset($rutas[$page])) {
    $modo_actual = $_COOKIE['modo_visualizacion'] ?? 'claro';
    include $rutas[$page];
} else {
    http_response_code(404);
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Pagina no encontrada</title>
        <style>
            body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
            h1 { color: #c33; }
        </style>
    </head>
    <body>
        <h1>404 - Pagina no encontrada</h1>
        <p>El ejercicio solicitado no existe.</p>
        <a href="index.php">Volver al inicio</a>
    </body>
    </html>
    <?php
}

if ($modo_actual === 'oscuro' && $page !== 'home'):
    ?>
    <script>
        document.body.classList.add('modo-oscuro');
    </script>
    <?php
endif;
?>
