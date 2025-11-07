<?php
// usuario.php - muestra datos del usuario autenticado
if (empty($_SESSION['user'])) {
    echo '<section><h2>No autenticado</h2><p>Accede con tu cuenta para ver esta página.</p></section>';
    return;
}
?>
<section>
    <h2>Mi cuenta</h2>
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($_SESSION['user']['name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['user']['email']); ?></p>
    <p><strong>Rol:</strong> <?php echo htmlspecialchars($_SESSION['user']['role']); ?></p>
    <p style="margin-top: 20px;"><a href="index.php?page=logout">Cerrar sesión</a></p>
</section>
