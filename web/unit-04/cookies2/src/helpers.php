<?php
/**
 * helpers.php - Funciones auxiliares
 */

/**
 * Verifica si la sesion ha expirado por inactividad
 */
function verificarTimeoutSesion() {
    $ahora = time();
    $ultimoAcceso = $_SESSION['ultimoAcceso'] ?? $ahora;
    $diferencia = $ahora - $ultimoAcceso;

    if ($diferencia > TIMEOUT_INACTIVIDAD) {
        return true;
    }

    $_SESSION['ultimoAcceso'] = $ahora;
    return false;
}

/**
 * Guarda una preferencia en cookie
 */
function guardarPreferencia($nombre, $valor) {
    setcookie($nombre, $valor, time() + COOKIE_LIFETIME, '/');
}

/**
 * Obtiene una preferencia de cookie
 */
function obtenerPreferencia($nombre, $default = '') {
    return $_COOKIE[$nombre] ?? $default;
}

/**
 * Elimina una cookie
 */
function eliminarCookie($nombre) {
    if (isset($_COOKIE[$nombre])) {
        unset($_COOKIE[$nombre]);
        setcookie($nombre, '', time() - 3600, '/');
    }
}

?>
