<?php
$temperaturas = array();
$temperaturas['Caja_1'] = array(1,1,2,3,2,1,2,3,3,3,2,1,3,4);
$temperaturas['Caja_2'] = array(0,0,3,2,4,3,2,0,1,2,3,4,2,1);
$temperaturas['Caja_3'] = array(3,1,2,3,5,2,2,0,1,2,3,4,2,1);
$temperaturas['Caja_4'] = array(2,2,2,3,5,2,3,2,0,1,2,3,0,1);
$temperaturas['Caja_5'] = array(0,3,2,3,5,2,3,2,0,1,2,3,0,1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cajas con temperaturas > 4º</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background: #007acc;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f9ff;
        }
        .ok {
            color: green;
            font-weight: bold;
        }
        .alerta {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Cajas con temperatura superior a 4º</h2>
    <table>
        <tr>
            <th>Caja</th>
            <th>Temperaturas registradas</th>
            <th>¿Ha superado los 4º?</th>
        </tr>
        <?php
        foreach ($temperaturas as $caja => $valores) {
            $supero = false;
            foreach ($valores as $t) {
                if ($t > 4) {
                    $supero = true;
                    break;
                }
            }
            echo "<tr>";
            echo "<td>$caja</td>";
            echo "<td>" . implode(", ", $valores) . "</td>";
            echo "<td class='" . ($supero ? "alerta" : "ok") . "'>" . ($supero ? "Sí" : "No") . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>



