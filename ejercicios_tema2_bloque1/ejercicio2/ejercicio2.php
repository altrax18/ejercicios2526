<?php
define("NUMTABLAS", 10); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tablas de Multiplicar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f7;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .tabla {
            width: 200px;
            margin: 20px;
            float: left;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.1);
        }
        .tabla th {
            background: #007acc;
            color: white;
            padding: 8px;
            text-align: center;
        }
        .tabla td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: center;
        }
        .tabla tr:nth-child(even) {
            background: #f2f9ff;
        }
        .contenedor {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
    </style>
</head>
<body>
    <h1>Tablas de Multiplicar</h1>
    <div class="contenedor">
    <?php
    for ($i = 1; $i <= NUMTABLAS; $i++) {
        echo "<table class='tabla'>";
        echo "<tr><th colspan='2'>Tabla del $i</th></tr>";
        for ($j = 1; $j <= 10; $j++) {
            echo "<tr><td>$i × $j</td><td>" . ($i * $j) . "</td></tr>";
        }
        echo "</table>";
    }
    ?>
    </div>
</body>
</html>
