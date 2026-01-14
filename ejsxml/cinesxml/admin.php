<?php

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    switch ($accion) {
        case 'add':
            include 'add.php';
            break;
        case 'delete':
            include 'delete.php';
            break;
        case 'modify':
            include 'modify.php';
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Admin</h1>
    <a href="index.php">Volver</a>
    <form action="" method="get">
        <label for="accion">Selecciona lo que quieres hacer</label>
        <select name="accion" id="accion">
            <option value="add">Añadir pelicula</option>
            <option value="delete">Borrar pelicula</option>
            <option value="modify">Modificar sesion</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>