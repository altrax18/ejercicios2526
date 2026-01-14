<?php

require_once "autoload.php";

$cabecera = new MiCabecera("Figuras Geométricas");

if (!isset($_POST) && empty($_POST)) {
    header("Location: index.php");
}

$figura = $_POST['figura'];
$color = $_POST['color'];
$tamano = $_POST['tamano'];
$obj = null;

switch ($figura) {
    case "Circulo":
        $obj = new Circulo($color, $tamano);
        break;

    case "Cuadrado":
        $obj = new Cuadrado($color, $tamano);
        break;

    case "Rectangulo":
        $alto = $_POST['alto'];
        $obj = new Rectangulo($color, $tamano, $alto);
        break;

    case "Triangulo":
        $altura = $_POST['altura'];
        $obj = new Triangulo($color, $tamano, $altura);
        break;
}
ob_start();

if ($obj) {
    $obj->dibujar();
}

$imagenData = ob_get_clean();

$imagenBase64 = base64_encode($imagenData);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Figura</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="contenedor-vertical">

        <?php echo $cabecera; ?>
        
        <div class="resultado-card">
            <h1>Resultado</h1>

            <?php if ($obj) { ?>

                        <div class="imagen-container">
                            <img src="data:image/png;base64,<?php echo $imagenBase64; ?>" alt="Figura Generada">
                    </div>

                        <div class="datos">
                            <strong>Datos de la figura:</strong><br>
                            <?php echo str_replace(", ", "<br>", $obj->__toString()); ?>
                        </div>

                <?php } else { ?>
                        <p>Hubo un error al generar la figura.</p>
                <?php } ?>

                <br>
                <a href="index.php" class="volver-btn">Volver al inicio</a>
            </div>
        </div>

</body>

</html>