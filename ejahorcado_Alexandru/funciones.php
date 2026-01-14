<?php
function obtenerPalabraAleatoria()
{
    $palabras = [];
    $rutaPalabras = __DIR__ . '/palabras.php';
    if (file_exists($rutaPalabras)) {
        $palabras = include $rutaPalabras;
    }

    if (is_array($palabras) && count($palabras) > 0) {
        $indiceAleatorio = array_rand($palabras);
        return $palabras[$indiceAleatorio];
    } else {
        return null;
    }
}
function inicializarJuego()
{
    $_SESSION['intentos'] = 5;
    $_SESSION['letras_acertadas'] = [];
    $_SESSION['letras_fallidas'] = [];
    $_SESSION['letras_usadas'] = [];
    $_SESSION['resultado'] = null;
}
function rellenarPalabra($palabra, $letrasAcertadas)
{
    $resultado = '';
    for ($i = 0; $i < strlen($palabra); $i++) {
        $letra = $palabra[$i];
        if (in_array($letra, $letrasAcertadas)) {
            $resultado = $resultado . $letra . ' ';
        } else {
            $resultado = $resultado . '_ ';
        }
    }
    return trim($resultado);
}
function procesarLetra($letra)
{
    $letra = strtoupper($letra);

    if (!isset($_SESSION['letras_usadas'])) {
        $_SESSION['letras_usadas'] = [];
    }
    if (!isset($_SESSION['letras_acertadas'])) {
        $_SESSION['letras_acertadas'] = [];
    }
    if (!isset($_SESSION['letras_fallidas'])) {
        $_SESSION['letras_fallidas'] = [];
    }

    if (!in_array($letra, $_SESSION['letras_usadas'])) {
        $_SESSION['letras_usadas'][] = $letra;
        if (strpos($_SESSION['palabra'], $letra) !== false) {
            $_SESSION['letras_acertadas'][] = $letra;
        } else {
            $_SESSION['intentos']--;
            if (!isset($_SESSION['letras_fallidas'])) {
                $_SESSION['letras_fallidas'] = [];
            }
            $_SESSION['letras_fallidas'][] = $letra;

            if ($_SESSION['intentos'] === 0) {
                $_SESSION['resultado'] = 'derrota';
                return;
            }
        }

        $palabraRellena = rellenarPalabra($_SESSION['palabra'], $_SESSION['letras_acertadas']);
        if (str_replace(' ', '', $palabraRellena) === $_SESSION['palabra']) {
            $_SESSION['resultado'] = 'victoria';
            return;
        }
    }
}
function tecladoHTML()
{
    $abecedario = range('A', 'Z');
    $html = '<form method="post" action="">';
    if (!isset($_SESSION['letras_usadas'])) {
        $_SESSION['letras_usadas'] = [];
    }

    foreach ($abecedario as $letra) {
        if (!in_array($letra, $_SESSION['letras_usadas'])) {
            $html .= '<button type="submit" name="letra" value="' . $letra . '">' . $letra . '</button> ';
        }
    }
    $html .= '</form>';
    return $html;
}

function pintarAhorcado($intentosRestantes)
{
    $imagen = 'img/ahorcado' . (5 - $intentosRestantes) . '.png';
    if ($intentosRestantes >= 5) {
        return null;
    } else {
        return '<img src="' . $imagen . '" alt="Ahorcado" >';
    }
}

?>