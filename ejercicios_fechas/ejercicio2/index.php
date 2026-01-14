<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
    <input type="text" name="anio" placeholder="Año" required>
    <input type="text" name="mes" placeholder="Mes" required>
    <input type="submit" value="Enviar">
</form>

<?php
    require_once "calendario_funciones.php";
if (isset($_GET['anio']) && isset($_GET['mes'])) {
    $anio = $_GET['anio'];
    $mes = $_GET['mes'];
    calendario_mensual($anio, $mes);
}
?>

</body>
</html>
