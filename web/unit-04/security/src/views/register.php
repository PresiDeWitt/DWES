<?php
// register.php
?>
<section>
    <h2>Registro</h2>
    <?php if (!empty($errors)): ?>
        <ul class="errors">
            <?php foreach ($errors as $e): ?><li><?php echo htmlspecialchars($e); ?></li><?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form method="post">
        <label><span>Nombre:</span><input type="text" name="name" required></label>
        <label><span>Email:</span><input type="email" name="email" required></label>
        <label><span>Contraseña:</span><input type="password" name="password" required></label>
        <button type="submit">Registrarse</button>
    </form>
    <p style="margin-top: 15px;">¿Ya tienes cuenta? <a href="index.php?page=login">Inicia sesión aquí</a></p>
</section>
