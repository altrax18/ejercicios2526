<?php

function buscar($aguja, $pajar, $posInicial = 0) {
    $pos = stripos($pajar, $aguja, $posInicial);

    if ($pos === false) {
        return [];
    }

    $resto = buscar($aguja, $pajar, $pos + strlen($aguja));

    $resultado = [$pos]; 
    
    foreach ($resto as $res) {
        $resultado[] = $res; 
    }

    return $resultado;
}

function pintarFormulario() {
    echo <<<EOT
    '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
        <title>EJERCICIO 1 CADENAS</title>
    </head>
    <body>
        <h1>EJERCICIO 1 CADENAS</h1>
        <form method="post">
                <label>Introduce la cadena a buscar:</label>
                <input type="text" name="aguja" required>
                <br>
                <label>Introduce la cadena donde buscar:</label>
                <input type="text" name="pajar" required>
                <button type="submit">Buscar</button>
            </form>
    </body>
    </html>

    EOT; 
}

?>