<?php


function crear_tabla( $filas, $columnas,$opcionales = "width:100%; height:auto; background-color: pink; border:1px solid #000000;") {
    
    echo "<table style=\"$opcionales\">";   
    for ($i=0; $i < $filas; $i++) { 
        echo "<tr>";
        for ($j=0; $j < $columnas; $j++) { 
            echo "<td>Fila $i Columna $j</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    
}
?>