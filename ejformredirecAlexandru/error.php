<?php

$usuario = $_GET['usuario'];

echo "<h2>Error de acceso</h2>";
echo "<p>El usuario $usuario no ha podido registrarse.</p>";

header("refresh:5;url=index.php"); 
exit();
?>
