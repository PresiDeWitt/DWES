<?php
require_once __DIR__ . '/../src/config.php';

$pageTitle = APP_NAME . ' - RA02_C Etiquetas PHP';

include __DIR__ . '/includes/header.php';
?>
        <h1>RA02_C — Formas de etiquetas PHP</h1>
        <p>Las formas más habituales para incluir código servidor en PHP son:</p>
        <ul>
            <li><strong>&lt;?php ... ?&gt;</strong> — la forma estándar y recomendada; funciona siempre.</li>
            <li><strong>&lt;?= ... ?&gt;</strong> — atajo para <code>echo</code> (ej.: &lt;?= 'hola' ?&gt;). Es seguro y habitualmente habilitado.</li>
        </ul>
        <p>Nota: la etiqueta corta <strong>&lt;? ... ?&gt;</strong> depende de <code>short_open_tag</code> y no se recomienda por compatibilidad.</p>

        <h2>Ejemplos</h2>
        <pre>&lt;?php
echo "Hola mundo";
?&gt;

&lt;?= "Hola mundo" ?&gt;</pre>

        <p><a href="index.php">Volver</a></p>

<?php include __DIR__ . '/includes/footer.php';
