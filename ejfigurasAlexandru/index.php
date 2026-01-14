<?php
require_once "autoload.php";
$cabecera = new MiCabecera("Figuras Geométricas");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Figura</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="contenedor-vertical">

        <?php echo $cabecera; ?>

        <div class="tarjeta-unica">
            <h2>Selecciona una figura</h2>

            <form action="datos.php" method="POST">
                <label><input type="radio" name="figura" value="Circulo" required> Círculo</label>
                <label><input type="radio" name="figura" value="Cuadrado"> Cuadrado</label>
                <label><input type="radio" name="figura" value="Rectangulo"> Rectángulo</label>
                <label><input type="radio" name="figura" value="Triangulo"> Triángulo</label>
                <br>
                <button type="submit">Continuar</button>
            </form>
        </div>

    </div>

</body>
</html>