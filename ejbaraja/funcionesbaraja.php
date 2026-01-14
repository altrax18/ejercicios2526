<?php

$palos = ["oros", "copas", "espadas", "bastos"];
$baraja = [];

function crearBaraja($palos) {
    global $baraja;
    $baraja = [];
    foreach ($palos as $palo) {
        for ($i = 1; $i <= 12; $i++) {
            $baraja[] = $i . $palo . ".jpg";
        }
    }
}

function pintarCartas($cartas) {
    echo '<div>';
    foreach ($cartas as $carta) {
        echo "<img src='baraja/$carta'> ";
    }
    echo '</div>';
}

function seleccionaCartas($num, $orden) {
    global $baraja;
    $seleccion = [];

    if ($num > 0 && $num <= count($baraja)) {
        $indices = array_rand($baraja, $num);

        if ($num == 1) {
            $seleccion[] = $baraja[$indices];
        } else {
            foreach ($indices as $i) {
                $seleccion[] = $baraja[$i];
            }
        }
    }

    if ($orden) {
        sort($seleccion);
    }

    pintarCartas($seleccion);
}

function barajar() {
    global $baraja;
    shuffle($baraja);
}

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    if (isset($_POST['palos'])) {
        $palosSeleccionados = $_POST['palos'];
        crearBaraja($palosSeleccionados);
    } else {
        crearBaraja($palos);
    }

    if (isset($_POST['numCartas'])) {
        $numCartas = $_POST['numCartas'];
    } else {
        $numCartas = 0;
    }

    switch ($accion) {
        case 'ver':
            seleccionaCartas(count($baraja));
            break;

        case 'barajar':
            barajar();
            if ($numCartas > 0 && $numCartas <= count($baraja)) {
                seleccionaCartas($numCartas);
            } else {
                seleccionaCartas(count($baraja));
            }
            break;

        case 'seleccionar':
            if ($numCartas > 0 && $numCartas <= count($baraja)) {
                if (isset($_POST['orden'])) {
                    seleccionaCartas($numCartas, false);
                } else {
                    seleccionaCartas($numCartas, true);
                }
            } else {
                echo "<p>Por favor, introduce un número válido de cartas (entre 1 y 48).</p>";
            }
            break;
    }
}
?>
