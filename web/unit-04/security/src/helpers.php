<?php
// Helpers para módulo Security
$config = require __DIR__ . '/config.php';

function getPdo()
{
    static $pdo = null;
    global $config;
    if ($pdo === null) {
        $dsn = 'sqlite:' . $config['db_path'];
        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $pdo;
}

function encryptPhone(string $plaintext)
{
    global $config;
    $key = substr(hash('sha256', $config['secret_key'], true), 0, 32);
    $iv = openssl_random_pseudo_bytes(16);
    $cipher = 'AES-256-CBC';
    $ct = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $ct);
}

function decryptPhone(string $ciphertext_b64)
{
    global $config;
    $data = base64_decode($ciphertext_b64);
    if ($data === false || strlen($data) < 17) return '';
    $iv = substr($data, 0, 16);
    $ct = substr($data, 16);
    $key = substr(hash('sha256', $config['secret_key'], true), 0, 32);
    $cipher = 'AES-256-CBC';
    $pt = openssl_decrypt($ct, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    return $pt === false ? '' : $pt;
}

