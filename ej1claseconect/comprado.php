<?php
require_once 'autoload.php';
$cabecera = new MiCabecera("Compra realizada con exito");

if (isset($_POST['sale_id']) && !empty($_POST['sale_id']) && isset($_POST['amounts']) && is_array($_POST['amounts'])) {
    $saleBook = new Book();
    $saleBook->insercion_venta_libro($_POST['sale_id'], $_POST['amounts']);
    $saleBook->updateStock($_POST['amounts']);
}else{
    header("Location: comprar.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Comprado</title>
</head>
<body>
    <div class="contenedor-vertical">
    <?php echo $cabecera; ?>
    <h2>Gracias por su compra</h2>
    <a href="comprar.php" class="volver-btn">Volver</a>
    </div>
</body>
</html>