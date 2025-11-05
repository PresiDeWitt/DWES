<?php
// editor.php - accesible para roles 'admin' y 'editor'
if (empty($_SESSION['user']) || !in_array(($_SESSION['user']['role'] ?? ''), ['admin','editor'])) {
    echo '<section><h2>Acceso denegado</h2><p>No tienes permisos para ver esta página.</p></section>';
    return;
}
?>
<section>
    <h2>Zona de editor</h2>
    <p>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>. Aquí puedes editar contenidos (simulado).</p>
</section>

