<?php
try {
    $mysqli = new mysqli("localhost", "root", "", "libros");
    $mysqli->query("DROP DATABASE libros");
    echo "Base de datos eliminada";

} catch (Exception $e) {
    echo "Base de datos no encontrada";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Base de Datos</title>
</head>
<body>
    <br>
    <a href="index.php">Volver</a>
</body>
</html>