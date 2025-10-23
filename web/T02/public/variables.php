<?php
// public/variables.php
require_once __DIR__ . '/../src/config.php';

$pageTitle = APP_NAME . ' - Ámbitos';

$mensaje = "Bienvenido al sitio";
function mostrar_mensaje() {
    global $mensaje;
    $local = "Este es un mensaje local";
    echo "<p>Mensaje global dentro de la función: " . htmlspecialchars($mensaje) . "</p>";
    echo "<p>Mensaje local dentro de la función: " . htmlspecialchars($local) . "</p>";
}

include __DIR__ . '/includes/header.php';
?>
        <h1>Ámbitos de las variables</h1>
        <?php
        mostrar_mensaje();
        echo "<p>Mensaje global fuera de la función: " . htmlspecialchars($mensaje) . "</p>";
        ?>
        <p><a href="index.php">Volver</a></p>

<?php include __DIR__ . '/includes/footer.php';
