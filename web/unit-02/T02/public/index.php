<?php
require_once __DIR__ . '/../src/config.php';

$pageTitle = APP_NAME . ' - Inicio';
$date = date("Y-m-d");
$name = '';
$greeting = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['nombre'] ?? '');
    if ($name !== '') {
        $greeting = 'Hola, ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    } else {
        $greeting = 'Por favor, introduce tu nombre.';
    }
}

// Incluir header para mantener la misma estructura que en productos.php
include __DIR__ . '/includes/header.php';

?>
        <h1>Fecha: <?php echo htmlspecialchars($date, ENT_QUOTES, 'UTF-8'); ?></h1>

        <section>
            <h2>Saludo</h2>
            <form method="post" action="">
                <label for="nombre">Introduce tu nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" required>
                <button type="submit">Enviar</button>
            </form>

            <?php if ($greeting): ?>
                <p class="notice"><?php echo $greeting; ?></p>
            <?php endif; ?>
        </section>

        <nav>
            <h2>Ejercicios</h2>
            <ul>
                <li><a href="productos.php">RA02_B - Productos (leer productos.txt)</a></li>
                <li><a href="calculadora.php">RA02_D - Calculadora</a></li>
                <li><a href="variables.php">RA02_H - Variables y ámbitos</a></li>
                <li><a href="frases.php">RA02_E - Frases</a></li>
                <li><a href="tipos.php">RA02_G - Tipos / ejemplos</a></li>
                <li><a href="ra02c.php">RA02_C - Etiquetas PHP</a></li>
                <li><a href="ra02f.php">RA02_F - Configuración PHP/Apache</a></li>
            </ul>
        </nav>

        <!-- Enlace para volver al índice general del proyecto -->
        <p style="margin-top:16px;"><a href="/index.php">← Volver al índice general</a></p>

<?php include __DIR__ . '/includes/footer.php';
