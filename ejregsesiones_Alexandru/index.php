<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("Location: bienvenida.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Sesiones</title>
</head>

<body>
    <h1>Formulario de registro</h1>

    <form action="validacion.php" method="post">
        <?php
        $errores = $_SESSION['errores'] ?? [];
        $datos = $_SESSION['datos'] ?? [];
        ?>
        <label>Usuario *</label>
        <input type="text" name="usuario" value="<?= $datos['usuario'] ?? '' ?>">
        <br>
        <span class="error"><?= $errores['usuario'] ?? '' ?></span>
        <label>Nombre *</label>
        <input type="text" name="name" placeholder="Nombre" value="<?= $datos['name'] ?? '' ?>">
        <br>
        <span class="error"><?= $errores['name'] ?? '' ?></span>
        <label>Apellidos</label>
        <input type="text" name="surname" placeholder="Apellidos" value="<?= $datos['surname'] ?? '' ?>">
        <label> Contraseña *</label>
        <input type="password" name="password" placeholder="Contraseña">
        <br>
        <span class="error"><?= $errores['password'] ?? '' ?></span>
        <label> Correo electrónico*</label>
        <input type="email" name="email" placeholder="Correo" value="<?= $datos['email'] ?? '' ?>">
        <br>
        <span class="error"><?= $errores['email'] ?? '' ?></span>
        <label>Edad</label>
        <input type="number" name="edad" placeholder="Edad" value="<?= $datos['edad'] ?? '' ?>">
        <label>DNI *</label>
        <input type="text" name="dni" placeholder="Dni" value="<?= $datos['dni'] ?? '' ?>">
        <br>
        <span class="error"><?= $errores['dni'] ?? '' ?></span>
        <label>Ciudad</label>
        <input type="text" name="city" placeholder="Ciudad" value="<?= $datos['city'] ?? '' ?>">
        <span class="error"><?= $errores['city'] ?? '' ?></span>
        <label>Código Postal*</label>
        <input type="number" name="codpost" placeholder="Código Postal" value="<?= $datos['codpost'] ?? '' ?>">
        <label>País</label>
        <input type="text" name="country" placeholder="País" value="<?= $datos['country'] ?? '' ?>">
        <label>Estudios</label>
        <input type="text" name="studies" placeholder="Estudios" value="<?= $datos['studies'] ?? '' ?>">
        <label>Idiomas</label>
        <input type="text" name="langs" placeholder="Idiomas" value="<?= $datos['langs'] ?? '' ?>">
        <input type="submit" value="Registrar">
    </form>
</body>

</html>