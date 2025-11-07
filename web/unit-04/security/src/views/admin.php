<?php
// admin.php - accesible solo para role = 'admin'
if (empty($_SESSION['user']) || ($_SESSION['user']['role'] ?? '') !== 'admin') {
    echo '<section><h2>Acceso denegado</h2><p>No tienes permisos para ver esta página.</p></section>';
    return;
}
?>
<section>
    <h2>Panel Admin</h2>
    <p>Bienvenido al panel de administración, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>.</p>
    <p>Aquí puedes gestionar todos los usuarios y configuraciones del sistema.</p>
    <p style="margin-top: 20px;">
        <a href="index.php">Volver al inicio</a>
    </p>
</section>
