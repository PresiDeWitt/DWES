<?php
// home.php
?>
<section>
    <h2>Bienvenido al módulo Security</h2>
    <?php if (empty($_SESSION['user'])): ?>
        <p>Accede con tu cuenta o regístrate.</p>
        <p><a href="index.php?page=login">Login</a> · <a href="index.php?page=register">Registro</a></p>
    <?php else: ?>
        <p>Estás conectado como <strong><?php echo htmlspecialchars($_SESSION['user']['name']); ?></strong> (<?php echo htmlspecialchars($_SESSION['user']['role']); ?>).</p>
        <p><a href="index.php?page=usuario">Mi cuenta</a> · <a href="index.php?page=logout">Cerrar sesión</a></p>
    <?php endif; ?>
</section>

