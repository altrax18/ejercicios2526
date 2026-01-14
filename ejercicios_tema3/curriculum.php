<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículum</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f8;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }
        form, .cv {
            background: #fff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<?php
    if (isset($_POST['Enviar'])) {
        echo '<div class="cv">';
        echo "<h1>Currículum</h1>";
        echo "<h3>".$_POST["nombre"]."</h3>";
        echo "<p><b>Dirección:</b> ".$_POST["direccion"]."</p>";
        
        if (!empty($_POST["fecha_nacimiento"])){
            echo "<p><b>Nacido el:</b> ".$_POST["fecha_nacimiento"]."</p>";
        } else {
            echo "<p><b>Fecha de nacimiento:</b> No seleccionada</p>";
        }
        
        
        if (isset($_POST["idiomas"])) {
            $idiomas = $_POST["idiomas"];
            echo "<p><b>Idiomas:</b></p><ul>";
            foreach ($idiomas as $idioma) {
                echo "<li>".$idioma."</li>";
            }
            echo "</ul>";
        } else {
            echo "<p><b>Idiomas:</b> No seleccionados</p>";
        }

        
        if (isset($_POST["sexo"])) {
            echo "<p><b>Sexo:</b> ".$_POST["sexo"]."</p>";
        } else {
            echo "<p><b>Sexo:</b> No seleccionado</p>";
        }

        
        if (isset($_POST["aficiones"])) {
            $aficiones = $_POST["aficiones"];
            echo "<p><b>Aficiones:</b></p><ul>";
            foreach ($aficiones as $aficion) {
                echo "<li>".$aficion."</li>";
            }
            echo "</ul>";
        } else {
            echo "<p><b>Aficiones:</b> No seleccionadas</p>";
        }

        if (!empty($_POST["observaciones"])) {
            echo "<p><b>Observaciones:</b> ".$_POST["observaciones"]."</p>";
        } else {
            echo "<p><b>Observaciones:</b> Ninguna</p>";
        }

        
        echo '</div>';

    } else { ?>
        <h1>Currículum</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <p><label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre"></p>

            <p><label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion"></p>

            <p><label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"></p>

            <p><label>Idiomas:</label></p>
            <p>Español<input type="checkbox" name="idiomas[]" value="Español"></p>
            <p>Inglés<input type="checkbox" name="idiomas[]" value="Inglés"></p>
            <p>Francés<input type="checkbox" name="idiomas[]" value="Francés"></p>
            <p>Alemán<input type="checkbox" name="idiomas[]" value="Alemán"></p>

            <p><label for="sexo">Sexo:</label></p>
            <p>Hombre<input type="radio" name="sexo" value="Hombre"></p>
            <p>Mujer<input type="radio" name="sexo" value="Mujer"></p>

            <p><label for="aficiones">Aficiones:</label></p>
            <select name="aficiones[]" id="aficiones" multiple>
                <option value="Senderismo">Senderismo</option>
                <option value="Carpintería">Carpintería</option>
                <option value="Jardinería">Jardinería</option>
                <option value="Ciclismo">Ciclismo</option>
                <option value="Pintura">Pintura</option>
            </select>

            <p><label for="observaciones">Observaciones:</label></p>
            <textarea name="observaciones" id="observaciones"></textarea>
            
            <p><input type="submit" name="Enviar" value="Enviar"></p>
        </form>
<?php } ?>
</body>
</html>
