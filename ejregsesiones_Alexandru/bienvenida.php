<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Bienvenido</title>
</head>

<body>
    <h1>¡Bienvenido! <?php echo $_SESSION['name']; ?></h1>
    <p>Has iniciado sesión correctamente.</p>
    <a href="salida.php">Cerrar sesión</a>

</body>

</html>