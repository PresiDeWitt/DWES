<?php
/**
 * ejercicio3.php - Temporizador
 */

require __DIR__ . '/../helpers.php';

$titulo = 'Ejercicio 3 - Timeout';

$expirada = false;

if (verificarTimeoutSesion()) {
    $expirada = true;
    session_destroy();
    session_start();
}

if (!$expirada) {
    $ahora = time();
    $ultimo = $_SESSION['ultimoAcceso'] ?? $ahora;
    $inactivo = $ahora - $ultimo;
    $restante = TIMEOUT_INACTIVIDAD - $inactivo;
    $ultima = date('H:i:s', $ultimo);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['reiniciar'])) {
        $_SESSION['ultimoAcceso'] = time();
        header('Location: index.php?page=ejercicio3');
        exit;
    }

    if (isset($_POST['cerrar'])) {
        session_destroy();
        header('Location: index.php?page=ejercicio3');
        exit;
    }
}

include __DIR__ . '/layout/header.php';
?>

<h1>Temporizador de Sesion</h1>
<p><a href="index.php">Volver</a></p>

<hr>

<?php if ($expirada): ?>
    <h2>Sesion expirada</h2>
    <p>Tu sesion se cerro por inactividad (<?php echo TIMEOUT_INACTIVIDAD; ?> segundos).</p>
    <p><a href="index.php?page=ejercicio3">Volver</a></p>
<?php else: ?>
    <h2>Estado de la sesion</h2>
    <p><strong>Estado:</strong> Activa</p>
    <p><strong>Ultima actividad:</strong> <?php echo $ultima; ?></p>
    <p><strong>Tiempo inactivo:</strong> <?php echo $inactivo; ?> segundos</p>
    <p><strong>Tiempo maximo:</strong> <?php echo TIMEOUT_INACTIVIDAD; ?> segundos</p>
    <p><strong>Tiempo restante:</strong> <?php echo $restante; ?> segundos</p>

    <form method="POST">
        <button type="submit" name="reiniciar">Reiniciar contador</button>
        <button type="submit" name="cerrar">Cerrar sesion</button>
    </form>

    <hr>

    <h2>Como funciona</h2>
    <p>Se guarda el tiempo en $_SESSION['ultimoAcceso']</p>
    <p>En cada peticion se verifica si paso mas tiempo del permitido</p>
    <p>Si paso el tiempo, se destruye la sesion</p>

    <h3>Codigo:</h3>
    <pre>$ahora = time();
$diferencia = $ahora - $_SESSION['ultimoAcceso'];

if ($diferencia > TIMEOUT_INACTIVIDAD) {
    session_destroy();
}</pre>
<?php endif; ?>

<?php include __DIR__ . '/layout/footer.php'; ?>
