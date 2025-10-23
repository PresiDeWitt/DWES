<?php
// src/helpers.php
/**
 * Lee un archivo de productos y devuelve un array con ['nombre', 'precio']
 * En caso de error, $error contendrá la descripción.
 */
function read_products(string $filePath, ?string & $error = null): array {
    $error = '';
    $productos = [];
    if (!file_exists($filePath)) {
        $error = "El archivo productos.txt no existe.";
        return [];
    }
    $lineas = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lineas === false || count($lineas) === 0) {
        $error = "El archivo está vacío o no se pudieron leer las líneas.";
        return [];
    }
    foreach ($lineas as $line) {
        $parts = explode(',', $line, 2);
        if (count($parts) == 2) {
            $productos[] = ['nombre'=>trim($parts[0]), 'precio'=>trim($parts[1])];
        }
    }
    return $productos;
}

function format_price($price): string {
    return number_format((float)$price, 2, ',', '.');
}
