<?php
function calendario_mensual ($anio, $mes) {
    $nombre_mes = date('F', mktime(0, 0, 0, $mes, 1, $anio));
    $diasMes = date('t', mktime(0, 0, 0, $mes, 1, $anio));
    $primer_dia = date("N", mktime(0, 0, 0, $mes, 1, $anio));
    $dia = 1;


    echo '<table border="1">';
    echo '<tr><th colspan="7">' . $nombre_mes .' '. $anio . '</th>';
    echo '<tr><th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th></tr>';

    echo "<tr>";

    for ($i = 1; $i < $primer_dia; $i++) {
        echo "<td></td>";
    }

    for ($i = $primer_dia; $i <= 7; $i++) {
        echo "<td>$dia</td>";
        $dia++;
    }
    echo "</tr>";


    while ($dia <= $diasMes) {
        echo "<tr>";
        for ($i = 1; $i <= 7; $i++) {
            if ($dia <= $diasMes) {
                echo "<td>$dia</td>";
            } else {
                echo "<td></td>";
            }
            $dia++;
        }
        echo "</tr>";
    }
    echo "</table>";

}
?>