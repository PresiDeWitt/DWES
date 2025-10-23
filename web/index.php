<?php
// index.php - Índice principal de todas las tareas DWES

$tasks = [
    'T02' => [
        'name' => 'Tarea 02 - Fundamentos PHP',
        'path' => 'T02/public/',
        'description' => 'Ejercicios básicos de PHP: formularios, fechas, productos, calculadora'
    ],
    'T03' => [
        'name' => 'Tarea 03 - PHP Avanzado',
        'path' => 'T03/public/',
        'description' => 'Manejo de formularios, arrays, bucles y funciones en PHP'
    ]
];

// Función para verificar si un directorio existe
function taskExists($path) {
    return is_dir(__DIR__ . '/' . $path) && file_exists(__DIR__ . '/' . $path . 'index.php');
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
                        <a href="<?php echo htmlspecialchars($task['path']); ?>" class="btn" target="_blank">↗️ Abrir en nueva pestaña</a>
                        <a href="?source=<?php echo urlencode($task['path'] . 'index.php'); ?>" class="btn btn-secondary" target="_blank">📄 Ver Código</a>
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