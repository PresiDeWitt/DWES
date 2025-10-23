
<?php
// config.php - funciones y helpers para Tarea 3

/**
 * Genera un array con valores decrecientes de 3 en 3 desde $valor hasta 0.
 * Ejemplo: generarArray(15) => [15,12,9,6,3,0]
 * @param int $valor
 * @return array<int>
 */
function generarArray(int $valor): array
{
    $numeros = [];
    for ($v = $valor; $v >= 0; $v -= 3) {
        $numeros[] = $v;
    }
    return $numeros;
}

/**
 * Devuelve el HTML de una tabla con los valores del array pasado.
 * Cada elemento del array aparece en una celda <td> dentro de una única fila <tr>.
 * Usamos la clase CSS `num-table` para evitar atributos HTML obsoletos.
 * @param array<int> $valores
 * @return string
 */
function tabla(array $valores): string
{
    $html = '<table class="num-table"><tr>';
    foreach ($valores as $val) {
        $html .= '<td>' . htmlspecialchars((string)$val, ENT_QUOTES, 'UTF-8') . '</td>';
    }
    $html .= '</tr></table>';
    return $html;
}

/**
 * Sanea y obtiene un valor POST (trim + null si no existe)
 * @param string $name
 * @return string|null
 */
function input_post(string $name): ?string
{
    return array_key_exists($name, $_POST) ? trim((string)$_POST[$name]) : null;
}

/**
 * Sanea y obtiene un valor GET (trim + null si no existe)
 * @param string $name
 * @return string|null
 */
function input_get(string $name): ?string
{
    return array_key_exists($name, $_GET) ? trim((string)$_GET[$name]) : null;
}
