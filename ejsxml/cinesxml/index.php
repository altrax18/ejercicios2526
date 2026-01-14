<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Cartelera de Cine</title>

</head>
<body>

<div class="container">
    <?php
    if (file_exists('cinesenero2026.xml')) {
        $cartelera = simplexml_load_file('cinesenero2026.xml');
        
        $recinto = $cartelera->recinto; 
        
        echo "<header>";
        echo "<h1>" . $recinto['value'] . "</h1>";
        echo "<div>";
        echo $recinto->address . ", " . $recinto->city . " (" . $recinto->postcode . ")";
        echo "</div>";
        echo "<a href='admin.php'>Administrador</a>";
        echo "</header>";


        echo "<div class='peliculas'>";

        foreach ($recinto->evento as $evento) {
            $titulo = $evento->titulo['value'];
            $id = $evento->titulo['id'];
            $caratula = trim($evento->caratula);
            $compra = trim($evento->compra);
            $trailer = trim($evento->trailer);
            $sinopsis = trim($evento->sinopsis);
            $duracion = $evento->duracion . " min";
            $genero = $evento->genero;
            $calificacion = $evento->calificacion;

            echo "<div class='peli'>";
            
            echo "<div class='poster'>";
            echo "<img src='$caratula' alt='Poster de $titulo' alt='Poster no disponible'>";
            echo "</div>";

            echo "<div>";
            echo "<h2 class='titulo'>$titulo</h2>";
            
            echo "<div>";
            echo $genero;
            echo "<br> ";
            echo $duracion;
            echo "<br> ";
            echo $calificacion;
            echo "</div>";

            if (!empty($sinopsis)) {
                echo "<p>$sinopsis</p>";
            } else {
                echo "<p>Sinopsis no disponible.</p>";
            }

            echo "<div class='enlaces'>";
            if (!empty($trailer)) {
                echo "<a href='$trailer'>Ver Trailer</a>";
                echo "<br>";
            }
            if (!empty($compra)) {
                echo "<a href='$compra'>Comprar</a>";
                echo "<br>";
            }
            echo "</div>";

            echo "<div>";
            if (isset($evento->fechas->fecha)) {
                foreach ($evento->fechas->fecha as $fecha) {
                    $dateVal = $fecha['value'];
                    echo "<div class='sesiones'>";
                    echo "<span class='fecha'>$dateVal</span>";
                    echo "<div class='horarios'>";
                    
                    if (isset($fecha->sesiones->sala)) {
                        foreach ($fecha->sesiones->sala as $sala) {
                            $horarios = $sala; 
                            $timesArray = explode(',', $horarios);
                            foreach($timesArray as $time) {
                                echo "<span class='hora'>$time</span>";
                            }
                        }
                    }
                    echo "</div>";  
                    echo "</div>"; 
                }
            }
            echo "</div>"; 

            echo "</div>"; 
            echo "</div>"; 
        }

        echo "</div>"; 

    } else {
        echo "<p>Error: No se pudo cargar el archivo XML.</p>";
    }
    ?>
</div>

</body>
</html>