<?php
try {

    $mysqli = new mysqli("localhost", "root", "", "libros");
    echo $mysqli->host_info . "<br>";
    echo "Conectado a la base de datos";

} catch (Exception $e) {

    echo "Base de datos no encontrada. Intentando crearla...<br>";
    $mysqli = new mysqli("localhost", "root", "");

    if ($mysqli->query("CREATE DATABASE libros")) {
        $mysqli = new mysqli("localhost", "root", "", "libros");
        $sql = file_get_contents("libros.sql");
        mysqli_multi_query($mysqli, $sql);
        echo "Base de datos y tablas creadas correctamente <br>";
    } else {
        echo "Error creando la base de datos";
    }
}
