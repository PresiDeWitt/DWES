<?php
/**
 * ejercicio1.php - Carrito de Compras
 */

$titulo = 'Ejercicio 1 - Carrito';

// Productos
$productos = [
    1 => ['nombre' => 'Laptop', 'precio' => 999.99],
    2 => ['nombre' => 'Mouse', 'precio' => 25.50],
    3 => ['nombre' => 'Teclado', 'precio' => 85.00],
    4 => ['nombre' => 'Monitor', 'precio' => 350.00],
    5 => ['nombre' => 'Webcam', 'precio' => 65.99],
    6 => ['nombre' => 'Auriculares', 'precio' => 120.00],
];

// Procesar formularios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['agregar'])) {
        $id = (int)$_POST['producto_id'];

        if (isset($productos[$id])) {
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = [];
            }

            if (isset($_SESSION['carrito'][$id])) {
                $_SESSION['carrito'][$id]['cantidad']++;
            } else {
                $_SESSION['carrito'][$id] = [
                    'nombre' => $productos[$id]['nombre'],
                    'precio' => $productos[$id]['precio'],
                    'cantidad' => 1
                ];
            }

            $mensaje = 'Producto agregado';
        }
    }

    if (isset($_POST['eliminar'])) {
        $id = (int)$_POST['producto_id'];
        if (isset($_SESSION['carrito'][$id])) {
            unset($_SESSION['carrito'][$id]);
            $mensaje = 'Producto eliminado';
        }
    }

    if (isset($_POST['vaciar'])) {
        $_SESSION['carrito'] = [];
        $mensaje = 'Carrito vaciado';
    }
}

$total = 0;
$items = 0;
if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $item) {
        $total += $item['precio'] * $item['cantidad'];
        $items += $item['cantidad'];
    }
}

include __DIR__ . '/layout/header.php';
?>

<h1>Carrito de Compras</h1>
<p><a href="index.php">Volver</a></p>

<?php if (isset($mensaje)): ?>
    <p><strong><?php echo $mensaje; ?></strong></p>
<?php endif; ?>

<hr>

<h2>Productos</h2>
<?php foreach ($productos as $id => $p): ?>
    <p>
        <strong><?php echo $p['nombre']; ?></strong> - $<?php echo number_format($p['precio'], 2); ?>
        <form method="POST" style="display: inline;">
            <input type="hidden" name="producto_id" value="<?php echo $id; ?>">
            <button type="submit" name="agregar">Agregar</button>
        </form>
    </p>
<?php endforeach; ?>

<hr>

<h2>Mi Carrito (<?php echo $items; ?> items)</h2>

<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0): ?>
    <table>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Accion</th>
        </tr>
        <?php foreach ($_SESSION['carrito'] as $id => $item): ?>
            <tr>
                <td><?php echo $item['nombre']; ?></td>
                <td>$<?php echo number_format($item['precio'], 2); ?></td>
                <td><?php echo $item['cantidad']; ?></td>
                <td>$<?php echo number_format($item['precio'] * $item['cantidad'], 2); ?></td>
                <td>
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="producto_id" value="<?php echo $id; ?>">
                        <button type="submit" name="eliminar">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p><strong>Total: $<?php echo number_format($total, 2); ?></strong></p>

    <form method="POST">
        <button type="submit" name="vaciar">Vaciar carrito</button>
    </form>
<?php else: ?>
    <p>Carrito vacio</p>
<?php endif; ?>

<?php include __DIR__ . '/layout/footer.php'; ?>
