
<?php
require_once 'autoload.php';
$books = new Book();
$books = $books->getAllBooks();
$sale = null;
if (isset($_POST['customer_id']) && !empty($_POST['customer_id'])) {
    date_default_timezone_set('Europe/Madrid');
    $sale = new Sale($_POST['customer_id'], date('Y-m-d H:i:s'));
    $sale->addSale();
}else{
    header("Location: comprar.php");
}

$cabecera = new MiCabecera("Seleccionar Libro");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <?php echo $cabecera; ?>
    <form action="comprado.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>Libro</th>
                    <th>Stock</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book){ ?>
                <tr>
                    <td><?php echo $book['title']; ?></td>
                    <td><?php echo $book['stock']; ?></td>
                    <td>
                        <input type="number" name="amounts[<?php echo $book['id']; ?>]" min="0" max="<?php echo $book['stock']; ?>" placeholder="0">
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <input type="hidden" name="sale_id" value="<?php echo $sale ? $sale->getSaleId() : ''; ?>">
        <br>
        <button type="submit">Comprar</button>
    </form>
    
</body>
</html>