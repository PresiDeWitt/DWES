<?php
// Vista: sesionActiva.php
// Espera $_SESSION['inicio'] con timestamp
if (!isset($baseUrl)) {
    $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
}
$inicio = isset($_SESSION['inicio']) ? (int)$_SESSION['inicio'] : time();
$ahora = time();
$segundos = max(0, $ahora - $inicio);

$dias = intdiv($segundos, 86400);
$horas = intdiv($segundos % 86400, 3600);
$minutos = intdiv($segundos % 3600, 60);
$seg = $segundos % 60;

$partes = [];
if ($dias > 0) $partes[] = $dias . 'd';
if ($horas > 0) $partes[] = $horas . 'h';
if ($minutos > 0) $partes[] = $minutos . 'm';
$partes[] = $seg . 's';
$elapsed = implode(' ', $partes);
?>
<section>
    <h2>Sesión activa</h2>
    <p>Sesión iniciada: <?php echo date('Y-m-d H:i:s', $inicio); ?></p>
    <p>Tiempo de sesión: <?php echo $elapsed; ?></p>
    <p><a href="<?php echo htmlspecialchars($baseUrl); ?>/index.php?page=sesion&reset=1">Reiniciar sesión</a></p>
</section>
