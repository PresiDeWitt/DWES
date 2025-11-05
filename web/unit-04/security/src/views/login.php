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

    <form method="post" action="index.php?page=login">
        <label>Email: <input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required></label>
        <label>Contraseña: <input type="password" name="password" required></label>
        <button type="submit">Entrar</button>
    </form>
</section>

