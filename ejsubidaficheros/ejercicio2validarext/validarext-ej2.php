
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida de imágenes</title>
    <link rel="stylesheet" href="ficheros.css">
</head>

<body>
<?php
    if(!isset($_FILES['imagen'])){
?>

    <h1>Inserción de la fotografía del usuario:</h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
<?php
    echo "<p>Nombre usuario:<input type='text' name='usuario'/><br/></p>";
    echo "<p>Fichero con su fotografía:<input type='file' name='imagen'/><br/></p>";
?>
<input type="submit" value="Enviar">
</form>
   
<?php
    }else{


        if($_FILES['imagen']['type'] == 'image/gif' || $_FILES['imagen']['type'] == 'image/jpeg' ||
                $_FILES['imagen']['type'] == 'image/jpg' ){
            
            echo "<p> Nombre: ".$_FILES['imagen']['name']."</p>";
            echo "<p> Nombre temporal: ".$_FILES['imagen']['tmp_name']."</p>";
            echo "<p> Tamaño: ".$_FILES['imagen']['size']."</p>";
            echo "<p> Tipo: ".$_FILES['imagen']['type']."</p>";

            if (is_uploaded_file($_FILES['imagen']['tmp_name'])){
                $nombreDirectorio = "img/";
                $nombreFichero = strtolower($_FILES['imagen']['name']);
                $nombreCompleto = $nombreDirectorio.$nombreFichero;

                if (is_dir($nombreDirectorio)){ 
                     $idUnico = time();
                    $nombreFichero = $idUnico."-".$nombreFichero;
                    $nombreCompleto = $nombreDirectorio.$nombreFichero;

                    if (move_uploaded_file($_FILES['imagen']['tmp_name'],$nombreCompleto)) {
                        echo "Fichero subido con el nombre: $nombreFichero<br>";
                    } else {
                        echo "Error al mover el archivo.";
                    }
                }
                else {
                    echo 'Directorio definitivo inválido';
                }
            } else {
                print ("No se ha podido subir el fichero");
            }

        } else {
            print ("La extensión del fichero no es válida (.gif o .jpeg)");
        }
    }
?>
    
</body>
</html>

