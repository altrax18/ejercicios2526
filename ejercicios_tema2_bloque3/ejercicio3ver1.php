<?php


$dni=$_POST['dni'];
if (isset($dni)){

    echo 'La letra del DNI es : '.calcularLetra($dni);
    echo '<br>';
    echo 'El DNI final seria: '. $dni.calcularLetra($dni);
}else{
    
}

function calcularLetra($dni){
    $letra= substr("TRWAGMYFPDXBNJZSQVHLCKE", $dni%23,1);
    return $letra;}
?>