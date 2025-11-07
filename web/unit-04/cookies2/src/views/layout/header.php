<?php
/**
 * header.php - Encabezado comun
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($titulo ?? 'Cookies y Sesiones'); ?></title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
        }

        body.modo-oscuro {
            background-color: black;
            color: white;
        }

        .container {
            max-width: 800px;
        }

        table {
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
            border: 1px solid black;
        }

        body.modo-oscuro th,
        body.modo-oscuro td {
            border-color: white;
        }

        input[type="text"],
        input[type="number"] {
            padding: 3px;
        }

        button {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
