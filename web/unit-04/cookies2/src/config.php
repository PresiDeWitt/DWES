<?php
/**
 * config.php - Configuracion para el modulo de Cookies y Sesiones
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Tiempo de inactividad en segundos
define('TIMEOUT_INACTIVIDAD', 300); // 5 minutos

// Duracion de cookies en segundos
if (!defined('COOKIE_LIFETIME')) {
    define('COOKIE_LIFETIME', 7 * 24 * 60 * 60); // 7 dias
}

?>
