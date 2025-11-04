w<?php
// public/tipos.php
require_once __DIR__ . '/../src/config.php';

$pageTitle = APP_NAME . ' - Tipos';

$entero = 10;
$decimal = 8.22;
$booleano = true;
$cadena = "cadena";
define('PI', 3.14);
$sum = $entero + $decimal;

include __DIR__ . '/includes/header.php';
?>
        <h1>Tipos y operadores</h1>
        <ul>
            <li>Entero: <?php echo $entero; ?></li>
            <li>Decimal: <?php echo $decimal; ?></li>
            <li>Booleano: <?php echo ($booleano ? 'true' : 'false'); ?></li>
            <li>Cadena: <?php echo htmlspecialchars($cadena); ?></li>
            <li>Constante PI: <?php echo PI; ?></li>
        </ul>
        <p>Suma entero + decimal = <?php echo $sum; ?></p>
<p><a href="index.php">Volver</a></p>

<?php include __DIR__ . '/includes/footer.php';
