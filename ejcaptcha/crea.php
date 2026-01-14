<?php

if (!defined('AUTH')) {
    define('AUTH', createRandomString());
}

function create() {
    $captcha_text = AUTH; 

    $fondo = imagecreatefrompng("img/fondo.png");
    if (!$fondo) {
        die("No se pudo cargar la imagen de fondo.");
    }

    $width = imagesx($fondo);
    $height = imagesy($fondo);

    $im = imagecreatetruecolor($width, $height);
    imagecopy($im, $fondo, 0, 0, 0, 0, $width, $height);

    $arrayChars = str_split($captcha_text);
    $posx = 30;

    foreach ($arrayChars as $char) {
        $colorTexto = imagecolorallocate($im, random_int(0, 150), random_int(0, 150), random_int(0, 150));
        $fontSize = random_int(25, 35);
        $angle = random_int(-25, 25);
        $posx += 150;
        $posy = random_int(60, $height - 20);
        imagettftext($im, $fontSize, $angle, $posx, $posy, $colorTexto, "OpenSans-Regular.ttf", $char);
    }

    ob_start();
    imagepng($im);
    $content = ob_get_contents();
    ob_end_clean();

    imagedestroy($im);
    imagedestroy($fondo);

    $img = 'data:image/png;base64,' . base64_encode($content);

    return $img;
}

function createRandomString() {
    $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
    $captcha_text = '';
    for ($i = 0; $i < 5; $i++) {
        $captcha_text .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $captcha_text;
}

$AUTH = AUTH;
?>
