<?php
session_start();
require 'funciones.php';
require_once __DIR__.'/MiCabecera.php';

$cabecera = new MiCabecera("Juego del Ahorcado");

if (isset($_POST['reiniciar'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

if (!isset($_SESSION['intentos']) || !isset($_SESSION['letras_acertadas'])) {
    inicializarJuego();
}

if (!isset($_SESSION['palabra'])) {
    $palabraAleatoria = obtenerPalabraAleatoria();
    if ($palabraAleatoria !== null) {
        $_SESSION['palabra'] = strtoupper($palabraAleatoria);
    }
}

if (isset($_POST['letra'])) {
    $letra = $_POST['letra'];
    if (empty($_SESSION['resultado'])) {
        procesarLetra($letra);
    }
}
$_SESSION['palabra_rellena'] = rellenarPalabra($_SESSION['palabra'], $_SESSION['letras_acertadas']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Ahorcado - Juego</title>
</head>


    <?php echo $cabecera ?>

<body>

    <div class="container">
        <aside>
            <p><strong>Intentos restantes:</strong><br><?php echo $_SESSION['intentos']; ?></p>
            <p><strong>Letras acertadas:</strong><br><?php echo implode(' ', $_SESSION['letras_acertadas']) ?></p>
            <p><strong>Letras fallidas:</strong><br><?php echo implode(' ', $_SESSION['letras_fallidas']) ?></p>
            <p><strong>Letras usadas:</strong><br><?php echo implode(' ', $_SESSION['letras_usadas']) ?></p>
            <br>
            <div>
                <?php echo pintarAhorcado($_SESSION['intentos']); ?>
            </div>
        </aside>

        <main>

            <div class="area-juego">

                <h2><?php echo $_SESSION['palabra_rellena'] ?></h2>

                <?php
                if (empty($_SESSION['resultado'])) {
                    echo tecladoHTML();
                } else {
                    ?>
                    <div>
                        <?php if ($_SESSION['resultado'] === 'victoria') { ?>
                            <h3>¡Has ganado!</h3>
                        <?php } else { ?>
                            <h3>Has perdido</h3>
                        <?php } ?>
                        <p>La palabra era: <strong><?php echo $_SESSION['palabra']; ?></strong></p>
                        <form method="post">
                            <button type="submit" name="reiniciar">Jugar otra vez</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </main>
    </div>
</body>

</html>