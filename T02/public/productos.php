<?php
// public/productos.php
require_once __DIR__ . '/../src/config.php';
require_once __DIR__ . '/../src/helpers.php';

$pageTitle = APP_NAME . ' - Productos';
$archivo = __DIR__ . '/../data/productos.txt';
$productos = read_products($archivo, $error);

include __DIR__ . '/includes/header.php';
?>
        <h1>Lista de productos</h1>
        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php else: ?>
            <table>
                <thead>
                    <tr><th>Producto</th><th>Precio (€)</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $p): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($p['nombre']); ?></td>
                            <td><?php echo htmlspecialchars(format_price($p['precio'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <p><a href="index.php">Volver</a></p>

<?php include __DIR__ . '/includes/footer.php';
