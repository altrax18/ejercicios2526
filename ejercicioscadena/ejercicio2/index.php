<?php
include('funciones.php');


$resultado = "";

if (isset($_POST['texto']) && !empty($_POST['texto'])) {
    $texto = $_POST['texto'];
} else {
    $texto = "";
}

if (isset($_POST['palabra']) && !empty($_POST['palabra'])) {
    $palabra = $_POST['palabra'];
} else {
    $palabra = "";
}

if (isset($_POST['reemplazo']) && !empty($_POST['reemplazo'])) {
    $reemplazo = $_POST['reemplazo'];
} else {
    $reemplazo = "";
}


if (isset($_POST['texto']) && !empty($_POST['texto'])) {
    if (isset($_POST['remark'])) {
        $resultado = remark($texto, $palabra);
    } elseif (isset($_POST['remove'])) {
        $resultado = removeWord($texto, $palabra);
    } elseif (isset($_POST['replace'])) {
        $resultado = replaceWord($texto, $palabra, $reemplazo);
    } elseif (isset($_POST['count_words'])) {
        $resultado = "Número de palabras: " . countWords($texto);
    } elseif (isset($_POST['count_vowels'])) {
        $resultado = "Número de vocales: " . countVowels($texto);
    } elseif (isset($_POST['lower'])) {
        $resultado = strtolower($texto);
    } elseif (isset($_POST['upper'])) {
        $resultado = strtoupper($texto);
    } elseif (isset($_POST['refresh'])) {
        $texto = "";
        $resultado = "";
    }
}


pintarFormulario($texto, $resultado);
?>
