<?php 

function pintarFormulario() {
    echo '<form action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="post">';
    echo '<p>Nombre usuario: <input type="text" name="usuario" required></p>';
    echo '<p>Contraseña: <input type="password" name="contrasena" required></p>';
    echo '<p><input type="submit" value="Enviar"></p>';
    echo '</form>';
}

if (isset($_POST['usuario']) && isset($_POST['contrasena']) && !empty($_POST['usuario']) && !empty($_POST['contrasena'])){
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $usuarioCorrecto = "admin";
    $contrasenaCorrecta = "1234";

    if ($usuario === $usuarioCorrecto && $contrasena === $contrasenaCorrecta) {
        header("Location: verdatos.php");
        exit();
    } else {
        header("Location: error.php?usuario=" . urlencode($usuario));
        exit();
    }
}

echo "<h2>Acceso al sistema</h2>";
pintarFormulario();

?>
