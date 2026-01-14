<?php
if (isset($_COOKIE['idioma']) && isset($_COOKIE['fondo'])) {
    header("Location: introducir_cv.php");
        
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idiomas</title>
    <link rel="stylesheet" href="estilos.css">
    
</head>
<body>
    <form action="introducir_cv.php" method="get">
        <p><label>Selecciona color de fondo de la página:</label></p>
        <input type="color" name="fondo" />
        <p><label for="idioma">Idioma del formulario:</label></p>
        <div class="banderas">
            <label>
                <input type="radio" name="idioma" value="español">
                <img class="bandera" src="img/españa.jpg" alt="Español">
            </label>

            <label>
                <input type="radio" name="idioma" value="ingles">
                <img class="bandera" src="img/uk.jpg" alt="Inglés">
            </label>

            <label>
                <input type="radio" name="idioma" value="frances">
                <img class="bandera" src="img/francia.jpg" alt="Francés">
            </label>

            <label>
                <input type="radio" name="idioma" value="aleman">
                <img class="bandera" src="img/alemania.jpg" alt="Alemán">
            </label>
        </div>
        <br>
        <input type="submit" value="Introducir_cv">
    </form>
        
    </form>
    
</body>
</html>