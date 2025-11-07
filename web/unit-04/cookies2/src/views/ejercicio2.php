<?php
/**
 * ejercicio2.php - Preferencias
 */

$titulo = 'Ejercicio 2 - Preferencias';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar'])) {
    $modo = $_POST['modo'] ?? 'claro';

    if ($modo === 'oscuro' || $modo === 'claro') {
        setcookie('modo_visualizacion', $modo, time() + (7 * 24 * 60 * 60), '/');
        header('Location: index.php?page=ejercicio2');
        exit;
    }
}

$modo = $_COOKIE['modo_visualizacion'] ?? 'claro';

include __DIR__ . '/layout/header.php';
?>

<h1>Preferencias de Usuario</h1>
<p><a href="index.php">Volver</a></p>

<hr>

<h2>Selecciona modo</h2>

<form method="POST">
    <p>
        <label>
            <input type="radio" name="modo" value="claro" <?php echo ($modo === 'claro') ? 'checked' : ''; ?>>
            Modo Claro
        </label>
    </p>
    <p>
        <label>
            <input type="radio" name="modo" value="oscuro" <?php echo ($modo === 'oscuro') ? 'checked' : ''; ?>>
            Modo Oscuro
        </label>
    </p>
    <button type="submit" name="guardar">Guardar</button>
</form>

<hr>

<h2>Estado</h2>
<p><strong>Modo activo:</strong> <?php echo ucfirst($modo); ?></p>
<p><strong>Cookie:</strong> modo_visualizacion</p>
<p><strong>Valor:</strong> <?php echo $modo; ?></p>
<p><strong>Duracion:</strong> 7 dias</p>

<hr>

<p>Las cookies se guardan en el navegador y persisten. Las sesiones se pierden al cerrar.</p>

<?php include __DIR__ . '/layout/footer.php'; ?>
