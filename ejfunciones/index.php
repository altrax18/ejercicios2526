
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
    <link rel="stylesheet" href="funciones.css">
</head>
<body>
    
    <?php
    include 'tabla.php';
    if (isset($_GET['filas']) && isset($_GET['columnas']) && isset($_GET['opcionales'])) {
    $filas = $_GET['filas'];
    $columnas = $_GET['columnas'];
    $opcionales = $_GET['opcionales'];
    if (empty($opcionales)) {
        crear_tabla($filas, $columnas);
    }else {
        crear_tabla($filas, $columnas, $opcionales);
    }
    
    }else {
        echo <<<EOD
            <form action="index.php" method="get">
                    <input type="number" name="filas" placeholder="Número de filas">
                    <input type="number" name="columnas" placeholder="Número de columnas">
                    <input type="text" name="opcionales" placeholder="Opcionales">
                    <input type="submit" value="Crear tabla">
                </form>
        EOD;
    }
    ?>
    
</body>
</html>