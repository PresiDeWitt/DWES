<?php
// login.php
?>
<section>
    <h2>Login</h2>
    <?php if (!empty($errors)): ?>
        <ul class="errors">
            <?php foreach ($errors as $e): ?><li><?php echo htmlspecialchars($e); ?></li><?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form method="post">
        <label><span>Email:</span><input type="email" name="email" required></label>
        <label><span>Contraseña:</span><input type="password" name="password" required></label>
        <button type="submit">Entrar</button>
    </form>
    <p style="margin-top: 15px;">¿Sin cuenta? <a href="index.php?page=register">Regístrate aquí</a></p>
</section>
