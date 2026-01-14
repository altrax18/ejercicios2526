<?php
function cargarClases($clase) {
    $ruta = __DIR__ . "/clases/" . $clase . ".php";
    if (file_exists($ruta)) {
        require_once $ruta;
    }
}

spl_autoload_register("cargarClases");
?>
