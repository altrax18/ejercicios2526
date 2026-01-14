<?php
require_once "autoload.php";

$cabecera = new MiCabecera("Figuras Geométricas");
$figura = $_POST['figura'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="contenedor-vertical">
        
        <?php echo $cabecera; ?>

        <h2>Datos para <?php echo $figura; ?></h2>

        <form action="generar.php" method="POST">

            <input type="hidden" name="figura" value="<?php echo $figura; ?>">

            Color: <input type="color" name="color" required><br><br>

            <?php if ($figura == "Rectangulo"){ ?>
                Ancho: <input type="number" name="tamano" required><br><br>
                Alto: <input type="number" name="alto" required><br><br>

            <?php }elseif ($figura == "Triangulo"){ ?>
                Base: <input type="number" name="tamano" required><br><br>
                Altura: <input type="number" name="altura" required><br><br>

            <?php }else{ ?>
                Tamaño : <input type="number" name="tamano" required><br><br>
            <?php } ?>

            <button type="submit">Pintar</button>
        </form>
    </div>

</body>

</html>