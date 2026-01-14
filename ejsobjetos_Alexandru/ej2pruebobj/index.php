<?php
require_once "Costumer.php";
require_once __DIR__ . "/MiCabecera.php";
$cabecera = new MiCabecera("Librería de Clientes");
$clientes = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria</title>
</head>

<?php echo $cabecera ?>

<body>
    <form method = "post" action="">
        <input type="text" name="name1" placeholder="Nombre">
        <input type="text" name="lastname1" placeholder="Apellido">
        <input type="email" name="email1" placeholder="Email">
        <input type="text" name="book1" placeholder="Libro Favorito">
        <br>
        <input type="text" name="name2" placeholder="Nombre">
        <input type="text" name="lastname2" placeholder="Apellido">
        <input type="email" name="email2" placeholder="Email">
        <input type="text" name="book2" placeholder="Libro Favorito">
        <br>
        <input type="text" name="name3" placeholder="Nombre">
        <input type="text" name="lastname3" placeholder="Apellido">
        <input type="email" name="email3" placeholder="Email">
        <input type="text" name="book3" placeholder="Libro Favorito">
        <input type="submit" value="Agregar Clientes">
        
    </form>
    <?php
    if (isset($_POST)&& !empty($_POST)) {
        for ($i = 1; $i <= 3; $i++) {
            $name = $_POST['name' . $i] ?? '';
            $lastname = $_POST['lastname' . $i] ?? '';
            $email = $_POST['email' . $i] ?? '';
            $book = $_POST['book' . $i] ?? '';

            if ($name && $lastname && $email && $book) {
                $cliente = new Costumer($name, $lastname, $email);
                $clientes[] = $cliente;
                $books[] = $book;
            }
        }

            echo "<h2>Clientes Agregados:</h2>";
            foreach ($clientes as $cliente) {
                echo "<p>" .$cliente. "</p>";
            }
            echo "<h2>Libros Favoritos:</h2>";
            foreach ($books as $book) {
                echo "<p>" . $book . "</p>";
            }
        
    }

    ?>
    
    
</body>
</html>