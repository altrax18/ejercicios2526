
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ficheros.css">
</head>
<body>
    <?php
    if(!isset($_GET['fichero'])){
?>

    <h1>Solicitud de fotografía del usuario:</h1>
<form action="pedirficheros.php" method="get">
<?php
    echo "<p>Nombre de fichero:<input type='text' name='fichero'/><br/></p>";
?>
<input type="submit" value="Enviar">
</form>
   
<?php
    }else{
        $fichero = strtolower($_GET['fichero']);

        $archivos = glob("img/*".$fichero.".{jpg,jpeg,gif}", GLOB_BRACE);

        if (!empty($archivos)) {
            foreach ($archivos as $filename) {
                echo "<img src='$filename' alt='Imagen del usuario'><br>";
            }
        } else {
            print ("El fichero no existe");
        }
    }
?>
</body>
</html>

