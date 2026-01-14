<?php
require_once 'autoload.php';
$customers = new Customer();
$customers = $customers->getAllCustomers();
$cabecera = new MiCabecera("Seleccionar Cliente");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Seleccionar Cliente</title>
</head>
<body>
    <div class="contenedor-vertical">

    <?php echo $cabecera; ?>
    <form action="comprar_libros.php" method="post">
            <h3>Cliente:</h3>
        <select name="customer_id" id="customer_id">
            <?php
            foreach ($customers as $customer) {
                echo "<option value=" . $customer['id'] . ">" . $customer['firstname'] . " " . $customer['surname'] . "</option>";
            }
            ?>
        </select>
        <br>
        <button type="submit">Seleccionar</button>
    </form>
    </div>
    
</body>
</html>