<?php
// Vista: contadorVisitas.php
// Variables esperadas: $first (boolean), $_SESSION['visitas'], $baseUrl
if (!isset($baseUrl)) {
    $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
}
?>
<section>
    <h2>Contador de visitas</h2>
    <?php if (!empty($first)): ?>
        <p>Bienvenido. Esta es su primera visita.</p>
    <?php else: ?>
        <p>Visitas en esta sesión: <?php echo intval($_SESSION['visitas']); ?></p>
    <?php endif; ?>

    <p><a href="<?php echo htmlspecialchars($baseUrl); ?>/index.php?page=contador&reset=1">Reiniciar contador</a></p>
</section>
