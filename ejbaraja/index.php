<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Baraja Española</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body> 
    <header>
    <h1>Baraja Española</h1>
    </header>

    <form method="POST">
        <label>¿Cuántas cartas quieres ver?</label>
        <input type="number" name="numCartas" min="1" max="48" ><br><br>

        <label> 
            <input type="checkbox" name="palos[]" value="Oros">Oros
            <input type="checkbox" name="palos[]" value="Copas">Copas
            <input type="checkbox" name="palos[]" value="Espadas">Espadas
            <input type="checkbox" name="palos[]" value="Bastos">Bastos
        </label>
        <br><br>

        <button type="submit" name="accion" value="ver">Ver Baraja Completa</button>
        <button type="submit" name="accion" value="barajar">Barajar</button>
        <button type="submit" name="accion" value="seleccionar">Seleccionar Cartas</button>
        <input type="checkbox" name="orden" value="orden">Ordenar
    </form>

    <hr>
</body>
</html>

<?php


require_once "funcionesbaraja.php";

?>
