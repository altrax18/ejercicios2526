<?php
include('funciones.php');


pintarFormulario();

if (isset($_POST['aguja']) && !empty($_POST['aguja']) && isset($_POST['pajar']) && !empty($_POST['pajar'])) {
    $aguja = $_POST['aguja'];   
    $pajar = $_POST['pajar']; 

    $resultado = buscar($aguja, $pajar);

    if ($resultado === false) {
        echo "No se encontraron ocurrencias de <b>$aguja</b> en '$pajar'.";
    } else {
        echo "Ocurrencias de <b>$aguja</b> encontradas en posiciones: " . implode(", ", $resultado);
    }
}

?>
