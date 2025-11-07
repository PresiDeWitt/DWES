<?php
// home.php
?>
<section>
    <h2>Bienvenido al módulo Security</h2>
    <?php if (empty($_SESSION['user'])): ?>
        <p>Accede con tu cuenta o regístrate para continuar.</p>
        <p style="margin-top: 15px;">
            <a href="index.php?page=login">Login</a> ·
            <a href="index.php?page=register">Registro</a>
        </p>
        <hr style="margin: 20px 0; border: none; border-top: 1px solid #ddd;">
        <h3>Datos de prueba:</h3>
        <ul style="margin-left: 20px;">
            <li><strong>Admin:</strong> admin@example.com / admin123</li>
            <li><strong>Editor:</strong> editor@example.com / editor123</li>
            <li><strong>Usuario:</strong> user@example.com / user123</li>
        </ul>
    <?php else: ?>
        <p>✓ Estás conectado como <strong><?php echo htmlspecialchars($_SESSION['user']['name']); ?></strong></p>
        <p style="color: #999; font-size: 12px;">Rol: <?php echo htmlspecialchars($_SESSION['user']['role']); ?></p>
        <p style="margin-top: 15px;">
            <a href="index.php?page=usuario">Mi cuenta</a> ·
            <a href="index.php?page=logout">Cerrar sesión</a>
        </p>
    <?php endif; ?>
</section>
