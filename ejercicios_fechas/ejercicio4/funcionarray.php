
<?php
if (isset($_GET['anio'])) {
    $anio = $_GET['anio'];

    $meses = range(1, 12);

    function escribir_mes($mes, $anio) {
        static $contador = 0;
        if ($contador % 4 == 0) {
            echo "<tr>";
        }
        echo "<td>";
        calendario_mensual($anio, $mes);
        echo "</td>";
        $contador++;
        if ($contador % 4 == 0){ 
            echo "</tr>";
        }
    }

    function calendario_anual($anio, $meses) {
        echo '<table border="1" cellspacing="5" cellpadding="5" style="border-collapse:collapse">';
        echo '<tr><th colspan="4">Calendario del año: '. $anio . '</th></tr>';

        array_walk($meses, 'escribir_mes', $anio);
        $total = count($meses);
        if ($total % 4 != 0) {
            echo "</tr>";
        }
        echo "</table>";
    }

}

function calendario_mensual ($anio, $mes) {
    $nombre_mes = date('F', mktime(0, 0, 0, $mes, 1, $anio));
    $diasMes = date('t', mktime(0, 0, 0, $mes, 1, $anio));
    $primer_dia = date("N", mktime(0, 0, 0, $mes, 1, $anio));
    $dia = 1;

    echo '<table border="1" style="border-collapse:collapse; width:200px;">';
    echo '<tr><th colspan="7">' . $nombre_mes .'</th></tr>';
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

