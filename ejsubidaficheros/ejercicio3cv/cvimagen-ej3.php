<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículum con Foto</title>
    <link rel="stylesheet" href="ficherocv.css">
</head>
<body>
<?php
if (isset($_POST['Enviar'])) {

    $foto_subida = "";

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $nombreDirectorio = "img/";
        if (!is_dir($nombreDirectorio)) {
            mkdir($nombreDirectorio, 0777, true);
        }
        $nombreFichero = strtolower($_FILES['foto']['name']);
        $idUnico = time();
        $nombreFichero = $idUnico . "-" . $nombreFichero;
        $rutaCompleta = $nombreDirectorio . $nombreFichero;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaCompleta)) {
            $foto_subida = $rutaCompleta;
        } else {
            echo "<p>Error al subir la foto.</p>";
        }
    } else {
        echo "<p>No se ha subido ninguna foto.</p>";
    }

    echo '<div class="cv">';
    echo "<h1>Currículum</h1>";

    if ($foto_subida != "") {
        echo "<img src='$foto_subida' alt='Foto de perfil'>";
    }

    echo "<h3>" . htmlspecialchars($_POST["nombre"]) . "</h3>";
    echo "<p><b>Dirección:</b> " . htmlspecialchars($_POST["direccion"]) . "</p>";

    if (!empty($_POST["fecha_nacimiento"])) {
        echo "<p><b>Nacido el:</b> " . htmlspecialchars($_POST["fecha_nacimiento"]) . "</p>";
    } else {
        echo "<p><b>Fecha de nacimiento:</b> No seleccionada</p>";
    }

    if (isset($_POST["idiomas"])) {
        echo "<p><b>Idiomas:</b></p><ul>";
        foreach ($_POST["idiomas"] as $idioma) {
            echo "<li>" . htmlspecialchars($idioma) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p><b>Idiomas:</b> No seleccionados</p>";
    }

    if (isset($_POST["sexo"])) {
        echo "<p><b>Sexo:</b> " . htmlspecialchars($_POST["sexo"]) . "</p>";
    } else {
        echo "<p><b>Sexo:</b> No seleccionado</p>";
    }

    if (isset($_POST["aficiones"])) {
        echo "<p><b>Aficiones:</b></p><ul>";
        foreach ($_POST["aficiones"] as $aficion) {
            echo "<li>" . htmlspecialchars($aficion) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p><b>Aficiones:</b> No seleccionadas</p>";
    }

    if (!empty($_POST["observaciones"])) {
        echo "<p><b>Observaciones:</b> " . htmlspecialchars($_POST["observaciones"]) . "</p>";
    } else {
        echo "<p><b>Observaciones:</b> Ninguna</p>";
    }

    echo '</div>';

} else { ?>
    <h1>Currículum</h1>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <p><label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required></p>

        <p><label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" required></p>

        <p><label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"></p>

        <p><label>Foto de perfil:</label>
        <input type="file" name="foto" accept="image/*"></p>

        <p><label>Idiomas:</label></p>
        <p>Español<input type="checkbox" name="idiomas[]" value="Español"></p>
        <p>Inglés<input type="checkbox" name="idiomas[]" value="Inglés"></p>
        <p>Francés<input type="checkbox" name="idiomas[]" value="Francés"></p>
        <p>Alemán<input type="checkbox" name="idiomas[]" value="Alemán"></p>

        <p><label>Sexo:</label></p>
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
