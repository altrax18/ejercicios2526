<?php

function remark($texto, $palabra) {
    return str_ireplace($palabra, "<mark>$palabra</mark>", $texto);
}

function removeWord($texto, $palabra) {
    return str_ireplace($palabra, "", $texto);
}

function replaceWord($texto, $buscar, $reemplazar) {
    return str_ireplace($buscar, $reemplazar, $texto);
}

function countWords($texto) {
    return str_word_count($texto);
}

function countVowels($texto) {
    preg_match_all('/[aeiouAEIOU]/', $texto, $vocales);
    return count($vocales[0]);
}


function pintarFormulario($texto, $resultado) {
    echo <<<EOT
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="styles.css">
            <title>EJERCICIO 2 CADENAS</title>
        </head>
        <body>
            <h1>EJERCICIO 2 CADENAS</h1>

            <form method="post">
                <div>
                    <div>
                        <button name="remark">REMARK</button>
                        <button name="remove">REMOVE</button>
                        <button name="replace">REPLACE</button>
                        <button name="count_words">COUNT WORDS</button>
                        <button name="count_vowels">COUNT VOWELS</button>
                        <button name="lower">LOWER CASE</button>
                        <button name="upper">UPPER CASE</button>
                        <button name="refresh">REFRESH</button>
                        <br>
                        <input type="text" name="reemplazo" placeholder="Texto de reemplazo">
                        <input type="text" name="palabra" placeholder="Palabra objetivo">
                    </div>

                    <div>
                        <textarea name="texto" placeholder="Escribe algo aquí...">$texto</textarea>
                        <div>$resultado</div>
                    </div>
                </div>
            </form>

        </body>
        </html>
EOT;
}
?>