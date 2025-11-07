<?php
if (empty($_SESSION['user']) || !in_array(($_SESSION['user']['role'] ?? ''), ['admin','editor'])) {
    echo '<section><h2>Acceso denegado</h2><p>No tienes permisos para ver esta página.</p></section>';
    return;
}
?>
<section>
    <h2>Panel Editor</h2>
    <p>Bienvenido al panel de editor, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>.</p>
    <p>Aquí puedes crear y editar contenido del sistema.</p>
    <p style="margin-top: 20px;">
        <a href="index.php">Volver al inicio</a>
    </p>
</section>
