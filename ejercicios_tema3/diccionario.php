
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego de Verbos Irregulares</title>
</head>
<body>
    <h1>Juego de Verbos Irregulares</h1>

    <?php 
        if (isset($mensaje)){ 
            echo $mensaje; 
        }
    ?>

    <p>Verbo en español: </p>

    <form method="post">
        <label>Forma 1 (Infinitivo):</label>
        <input type="text" name="forma1" required><br><br>
        <label>Forma 2 (Pasado):</label>
        <input type="text" name="forma2" required><br><br>
        <label>Forma 3 (Participio):</label>
        <input type="text" name="forma3" required><br><br>
        <button type="submit" name="respuesta">Comprobar</button>
    </form>

    <p>Preguntas hechas: </p>
       <p>Aciertos: </p>
       <p>Fallos: </p>
</body>
</html>
