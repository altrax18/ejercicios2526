<?php
session_start();
if (isset($_POST)) {
    foreach ($_POST as $key => $value) {
        $datos[$key] = $value;
    }

    $errores = [];
    $datos = $_POST;
    $cities = ['madrid', 'barcelona', 'paris', 'londres', 'roma', 'berlín', 'milán'];
    

    if (empty($datos['usuario'])) {
        $errores['usuario'] = "El usuario es obligatorio.";
    }
    if (empty($datos['name'])) {
        $errores['name'] = "El nombre es obligatorio.";
    }
    if (empty($datos['email'])) {
        $errores['email'] = "El email es obligatorio.";
    }
    if (empty($datos['password'])) {
        $errores['password'] = "La contraseña es obligatoria.";
    }

    if (!empty($datos['dni'])) {
        if (preg_match('/^(\d{8})([A-Z])$/', $datos['dni'], $m)) {
            if (letraDNI($m[1]) != $m[2]) {
                $errores['dni'] = "La letra del DNI no es correcta.";
            }
        } else {
            $errores['dni'] = "Formato incorrecto. Debe ser 8 números y una letra.";
        }
    }else {
        $errores['dni'] = "El DNI es obligatorio.";
    }
    if (!in_array(strtolower($datos['city']), $cities)) {
        $errores['city'] = "La ciudad no es válida.";
    }

    if (count($errores) > 0) {
        $_SESSION['errores'] = $errores;
        $_SESSION['datos'] = $datos;
        header("Location: index.php");
    } else {
        $_SESSION['name'] = $datos['name'];
        $_SESSION['usuario'] = $datos['usuario'];

        guardarUsuario($datos);
        header('Location: bienvenida.php');
    }
} else {
    header("Location: index.php");
}

function letraDNI($numero)
{
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    return $letras[$numero % 23];
}

function guardarUsuario($datos)
{
    $usersFile = 'users.json';

    $users = [];
    if (file_exists($usersFile)) {
        $data = file_get_contents($usersFile);
        $users = json_decode($data, true);
    }

    foreach ($users as $u) {
        if (isset($u['usuario']) && $u['usuario'] === $datos['usuario']) {
        $errores['usuario'] = 'El usuario ya está registrado.';
        $_SESSION['errores'] = $errores;
        $_SESSION['datos'] = $datos;
        header('Location: index.php');
        exit;
    }
}

$newUser = [
    'usuario' => $datos['usuario'],
    'password' => password_hash($datos['password'], PASSWORD_DEFAULT),
];

$users[] = $newUser;
$saved = file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);


}
?>