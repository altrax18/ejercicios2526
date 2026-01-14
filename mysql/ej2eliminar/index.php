<?php

    $mysqli = new mysqli("localhost", "root", "", "libros");

    if ($mysqli->connect_errno) {
        echo "No existe la base de datos";
    } else {
        $mysqli->query("DROP DATABASE libros");
        echo "Base de datos eliminada";
    }


?>