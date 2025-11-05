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

    <form method="post" action="index.php?page=register">
        <label>Nombre: <input type="text" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required></label>
        <label>Email: <input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required></label>
        <label>Teléfono: <input type="text" name="phone" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>"></label>
        <label>Contraseña: <input type="password" name="password" required></label>
        <button type="submit">Registrarse</button>
    </form>
</section>

