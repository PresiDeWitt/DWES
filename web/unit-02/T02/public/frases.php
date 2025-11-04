<?php
// public/frases.php
require_once __DIR__ . '/../src/config.php';

$pageTitle = APP_NAME . ' - Frases';

$nombreNif = "Alejandro Chacón Ortega 77023537X";
$nota = "El código del script php siempre se incluye entre las etiquetas <?php y ?>";

include __DIR__ . '/includes/header.php';
?>
        <h1>Frases</h1>
        <p><?php echo $nombreNif; ?></p>
        <p><?php echo htmlentities($nota); ?></p>

    <p><a href="index.php">Volver</a></p>

<?php include __DIR__ . '/includes/footer.php';
