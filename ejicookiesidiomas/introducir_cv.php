<?php

$idiomas = array(
"español"=> array("nombre" => "Nombre:", "apellidos" => "Apellidos:", "edad" => "Edad:", "experiencia" => "Experiencia Laboral:", "enviar" => "Enviar"),
"ingles"=> array( "nombre" => "Name:", "apellidos" => "Surname:", "edad" => "Age:", "experiencia" => "Work Experience:", "enviar" => "Submit"),
"frances"=> array( "nombre" => "Prénom:", "apellidos" => "Nom de famille:", "edad" => "Âge:", "experiencia" => "Expérience professionnelle:", "enviar" => "Soumettre"),
"aleman"=> array(  "nombre" => "Vorname:", "apellidos" =>  "Nachname:", "edad" =>  "Alter:", "experiencia" => "Berufserfahrung:", "enviar" => "Einreichen")
);

if(isset($_GET['idioma']) && isset($_GET['fondo'])){
    setcookie('idioma', $_GET['idioma']);
    setcookie('fondo', $_GET['fondo']);
    header("Location: " . $_SERVER['PHP_SELF']);
}

if(isset($_COOKIE['idioma']) && isset($_COOKIE['fondo'])){
    
    $idioma = $_COOKIE['idioma'];      
    $fondo = $_COOKIE['fondo'];        
    $txt = $idiomas[$idioma];          
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Cv</title>
</head>
<body style="background-color: <?php echo $fondo; ?>;">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        
        <p><label><?php echo $txt["nombre"]; ?></label></p>
        <input type="text" name="nombre" />

        <p><label><?php echo $txt["apellidos"]; ?></label></p>
        <input type="text" name="apellidos" />

        <p><label><?php echo $txt["edad"]; ?></label></p>
        <input type="number" name="edad" />

        <p><label><?php echo $txt["experiencia"]; ?></label></p>
        <input type="text" name="experiencia" />

        <input type="submit" value="<?php echo $txt["enviar"]; ?>" />

    </form>
</body>
</html>

<?php
} else {
    echo "Por favor, selecciona el idioma y el color de fondo <a href='index.php'>aquí</a>.";
}

?>
