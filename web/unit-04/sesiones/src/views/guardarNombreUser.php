<?php
// Vista: guardarNombreUser.php
// Variable esperada: $_SESSION['usuario_nombre']
if (!isset($baseUrl)) {
    $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
}
?>
<section>
    <h2>Guardar nombre en sesión</h2>

    <?php if (!empty($_SESSION['usuario_nombre'])): ?>
        <p>Hola <?php echo $_SESSION['usuario_nombre']; ?>, bienvenido de nuevo.</p>
        <p><a href="<?php echo htmlspecialchars($baseUrl); ?>/index.php?page=usuario&logout=1">Eliminar nombre</a></p>
    <?php else: ?>
        <form method="post" action="<?php echo htmlspecialchars($baseUrl); ?>/index.php?page=usuario">
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre" required>
            <button type="submit">Enviar</button>
        </form>
    <?php endif; ?>

</section>
