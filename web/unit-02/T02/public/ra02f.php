<?php
require_once __DIR__ . '/../src/config.php';

$pageTitle = APP_NAME . ' - RA02_F Configuración';

include __DIR__ . '/includes/header.php';
?>
        <h1>RA02_F — Directorios y configuración PHP/Apache</h1>
        <p>Directorios/archivos importantes en un entorno tipo XAMPP/LAMP:</p>
        <ul>
            <li><strong>htdocs</strong> (o <code>/opt/lampp/htdocs</code>) — raíz donde colocas tus páginas web.</li>
            <li><strong>httpd.conf</strong> (Apache) — configuración principal de Apache.</li>
            <li><strong>sites-available</strong>/<strong>sites-enabled</strong> — virtual hosts (en distribuciones Debian/Ubuntu).</li>
            <li><strong>php.ini</strong> — configuración principal de PHP (ruta típica en XAMPP: <code>/etc/php.ini</code> o dentro del directorio de instalación).</li>
            <li>Logs: <code>apache2/error.log</code> y <code>php_errors.log</code> (según configuración).</li>
        </ul>
        <h2>Modificar características del motor PHP</h2>
        <ul>
            <li><strong>Tiempo máximo de ejecución</strong>: para 4 minutos (240 segundos), en <code>php.ini</code> ajusta: <code>max_execution_time = 240</code>. Alternativamente en tiempo de ejecución: <code>ini_set('max_execution_time', 240);</code>.</li>
            <li><strong>No mostrar errores</strong>: en <code>php.ini</code> pon <code>display_errors = Off</code> y <code>log_errors = On</code>. Alternativamente en tiempo de ejecución: <code>ini_set('display_errors', 0); error_reporting(0);</code>.</li>
        </ul>

    <p><a href="index.php">Volver</a></p>

<?php include __DIR__ . '/includes/footer.php';
