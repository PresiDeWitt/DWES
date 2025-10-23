<?php
// public/calculadora.php
require_once __DIR__ . '/../src/config.php';

$pageTitle = APP_NAME . ' - Calculadora';

$resultado = null;
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = $_POST['a'] ?? '';
    $b = $_POST['b'] ?? '';
    $op = $_POST['op'] ?? '';
    if (!is_numeric($a) || !is_numeric($b)) {
        $error = "Ambos valores deben ser numéricos.";
    } else {
        $a = (float)$a;
        $b = (float)$b;
        switch ($op) {
            case 'sumar':
                $resultado = $a + $b;
                break;
            case 'restar':
                $resultado = $a - $b;
                break;
            case 'multiplicar':
                $resultado = $a * $b;
                break;
            case 'dividir':
                if ($b == 0) {
                    $error = "Error: división por cero.";
                } else {
                    $resultado = $a / $b;
                }
                break;
            default:
                $error = "Operación no válida.";
                break;
        }
    }
}

include __DIR__ . '/includes/header.php';
?>
        <h1>Calculadora básica</h1>
        <form method="post" action="">
            <label for="a">Número A:</label>
            <input id="a" type="number" step="any" name="a" value="<?php echo isset($_POST['a']) ? htmlspecialchars($_POST['a']) : ''; ?>" required>

            <label for="op">Operación:</label>
            <select id="op" name="op">
                <option value="sumar">Sumar</option>
                <option value="restar">Restar</option>
                <option value="multiplicar">Multiplicar</option>
                <option value="dividir">Dividir</option>
            </select>

            <label for="b">Número B:</label>
            <input id="b" type="number" step="any" name="b" value="<?php echo isset($_POST['b']) ? htmlspecialchars($_POST['b']) : ''; ?>" required>

            <button type="submit">Calcular</button>
        </form>

        <?php if ($error): ?><p class="error"><?php echo $error; ?></p><?php endif; ?>
        <?php if ($resultado !== null): ?><p class="notice"><strong>Resultado:</strong> <?php echo $resultado; ?></p><?php endif; ?>

        <p><a href="index.php">Volver</a></p>

<?php include __DIR__ . '/includes/footer.php';
