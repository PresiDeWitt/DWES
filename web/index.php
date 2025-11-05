<?php
// indexUnit-04.php - Índice principal de todas las tareas DWES

$tasks = [
        'T02' => [
                'name' => 'Tarea 02 - Fundamentos PHP',
                'path' => 'unit-02/T02/public/',
                'description' => 'Ejercicios básicos de PHP: formularios, fechas, productos, calculadora'
        ],
        'T03' => [
                'name' => 'Tarea 03 - PHP Avanzado',
                'path' => 'unit-03/T03/public/',
                'description' => 'Manejo de formularios, arrays, bucles y funciones en PHP'
        ],
        'T04' => [
                'name' => 'Tarea 04 - Sesiones, Cookies y Seguridad',
                // apuntar al índice de Unit-04 que reúne sesiones y security
                'path' => 'unit-04/indexUnit-04.php',
                'url' => 'unit-04/indexUnit-04.php',
                'description' => 'Índice Unit-04: Sesiones, Cookies y Seguridad'
        ],
];

// Función para verificar si una tarea existe (acepta archivo o carpeta con index.php)
function taskExists($path) {
    $full = __DIR__ . '/' . $path;
    // Si es un archivo (por ejemplo indexUnit-04.php)
    if (is_file($full)) return true;
    // Si es un directorio que contiene index.php
    if (is_dir($full) && file_exists(rtrim($full, '/\\') . DIRECTORY_SEPARATOR . 'index.php')) return true;
    return false;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWES - Índice de Tareas</title>
    <link rel="stylesheet" href="assets/css/styleHome.css">
</head>
<body>
<div class="container">
    <header class="header">
        <h1>DWES - Índice de Tareas</h1>
        <p>Selecciona una tarea para abrirla en una nueva pestaña o ver su código fuente.</p>
    </header>

    <div class="tasks-grid">
        <?php foreach ($tasks as $key => $task): ?>
            <?php $exists = taskExists($task['path']); ?>
            <div class="task-card">
                <span class="status <?php echo $exists ? 'status-available' : 'status-unavailable'; ?>">
                    <?php echo $exists ? '✅ Disponible' : '❌ No disponible'; ?>
                </span>

                <h2><?php echo htmlspecialchars($task['name']); ?></h2>
                <p><?php echo htmlspecialchars($task['description']); ?></p>

                <div class="task-actions">
                    <?php if ($exists): ?>
                        <?php $href = isset($task['url']) ? $task['url'] : $task['path'];
                              // abrir en la misma pestaña solamente si es el índice de Unit-04
                              $target = ($href === 'unit-04/indexUnit-04.php') ? '' : ' target="_blank"'; ?>
                        <a href="<?php echo htmlspecialchars($href); ?>" class="btn"<?php echo $target; ?>>↗️ Abrir</a>
                    <?php else: ?>
                        <span class="btn btn-secondary" style="cursor:default;">No disponible</span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <footer class="footer">
        <p>Desarrollo Web en Entorno Servidor - Todos los derechos reservados</p>
    </footer>
</div>
</body>
</html>