<?php
// Configuración mínima para el módulo Security
return [
    // Ruta hacia la base de datos SQLite (se creará si no existe)
    'db_path' => __DIR__ . '/../../data/users.sqlite',
    // Llave secreta para openssl_encrypt (debe ser de 32 bytes para AES-256)
    // En un entorno real no guardes la clave en texto; usa variables de entorno.
    'secret_key' => 'my_super_secret_key_32_bytes_len!'
];

