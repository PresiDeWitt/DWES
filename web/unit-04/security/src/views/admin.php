<?php
// admin.php - accesible solo para role = 'admin'
if (empty($_SESSION['user']) || ($_SESSION['user']['role'] ?? '') !== 'admin') {
    echo '<section><h2>Acceso denegado</h2><p>No tienes permisos para ver esta página.</p></section>';
    return;
}
?>
<section>
    <h2>Zona de administración</h2>
    <p>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>. Aquí puedes gestionar el sistema (simulado).</p>
</section>

