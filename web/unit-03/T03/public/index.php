<?php
// index.php - Página principal para la Tarea 3

// Cargar funciones y helpers
require_once __DIR__ . '/../src/config.php';

// Variables de salida
$saludo_output = '';
$valor_output = '';
bienvenida: // placeholder comment to avoid accidental removal
$bienvenida = '';

// RA03_d + RA03_a: Formulario nombre/edad (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_saludo'])) {
    $nombre = input_post('nombre') ?? '';
    $edad_raw = input_post('edad');
    $edad = (is_numeric($edad_raw) && $edad_raw !== '') ? (int)$edad_raw : null;

    $san_nombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
    if ($nombre === '') {
        $saludo_output = '<p>Introduzca un nombre.</p>';
    } elseif ($edad === null) {
        $saludo_output = '<p>Introduzca una edad numérica.</p>';
    } else {
        $saludo_output = '<p>Hola ' . $san_nombre . ', tienes ' . $edad . ' años.</p>';
        if ($edad >= 18) {
            $saludo_output .= '<p>Eres mayor de edad.</p>';
        } else {
            $saludo_output .= '<p>Eres menor de edad.</p>';
        }
    }
}

// RA03_e: Formulario 'valor' (POST) con reglas específicas
// Determinar si existe el parámetro 'valor' en POST
$valor_param_existe = array_key_exists('valor', $_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_valor'])) {
    if (!$valor_param_existe) {
        $valor_output = '<h2>No se ha introducido ningún valor</h2>';
    } else {
        $raw = input_post('valor');
        if ($raw === null || $raw === '') {
            $valor_output = '<p>Introduzca un valor</p>';
        } elseif (!is_numeric($raw)) {
            $valor_output = '<p>Introduzca un valor numérico</p>';
        } else {
            $num = (int)$raw;
            if ($num < 0) {
                $valor_output = '<p>Introduzca un valor positivo</p>';
            } elseif ($num >= 0 && $num <= 10) {
                $arr = generarArray($num);
                $valor_output = '<p>Array generado: [' . implode(', ', $arr) . ']</p>';
                $valor_output .= tabla($arr);
            } elseif ($num > 10) {
                $valor_output = '<p>Número demasiado grande</p>';
            } else {
                $valor_output = '<p>Valor desconocido</p>';
            }
        }
    }
}

// RA03_f: Capturar nombre por GET y mostrar bienvenida
if (isset($_GET['nombre'])) {
    $g = input_get('nombre');
    if ($g !== null && $g !== '') {
        $bienvenida = '<p>Bienvenido, ' . htmlspecialchars($g, ENT_QUOTES, 'UTF-8') . '</p>';
    }
}

// RA03_g: Bucle 1..10 par/impar
$paridad_html = '<ul>';
for ($i = 1; $i <= 10; $i++) {
    $tipo = ($i % 2 === 0) ? 'par' : 'impar';
    $paridad_html .= '<li>' . $i . ' - ' . $tipo . '</li>';
}
$paridad_html .= '</ul>';

// Incluir header
include __DIR__ . '/includes/header.php';
?>

<section>
    <h2>Formulario: Nombre y Edad</h2>
    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        <br>
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" min="0" value="<?php echo isset($_POST['edad']) ? htmlspecialchars((string)$_POST['edad'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        <br>
        <button type="submit" name="submit_saludo">Enviar saludo</button>
    </form>

    <?php echo $saludo_output; ?>
</section>

<hr>

<section>
    <h2>Formulario: Valor</h2>
    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <label for="valor">Valor:</label>
        <input type="text" id="valor" name="valor" value="<?php echo isset($_POST['valor']) ? htmlspecialchars((string)$_POST['valor'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        <button type="submit" name="submit_valor">Enviar valor</button>
    </form>

    <?php
    // Mostrar mensaje 'No se ha introducido ningún valor' si no existe el parámetro en POST (según enunciado)
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$valor_param_existe) {
        echo '<h2>No se ha introducido ningún valor</h2>';
    }
    ?>

    <?php echo $valor_output; ?>
</section>

<hr>

<section>
    <h2>Enlace GET</h2>
    <p><a href="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?nombre=Juan'); ?>">Enviar nombre por GET (Juan)</a></p>
    <?php echo $bienvenida; ?>
</section>

<hr>

<section>
    <h2>Números 1 a 10 con par/impar</h2>
    <?php echo $paridad_html; ?>
</section>

<?php
// Incluir footer
include __DIR__ . '/includes/footer.php';

