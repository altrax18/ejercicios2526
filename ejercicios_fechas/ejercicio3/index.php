<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
    <input type="text" name="anio" placeholder="Año" required>
    <input type="submit" value="Enviar">
</form>

<?php
require_once "calendario_funciones.php";
if (isset($_GET['anio'])) {
    $anio = $_GET['anio'];
    calendario_anual($anio);
}

?>

</body>
</html>
