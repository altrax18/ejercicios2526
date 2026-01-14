<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Generar DNI</h1>
    <?php
    if(!isset($_REQUEST['num'])){
        echo <<<EOD
        <form action="" class="form" method="get">
        Número DNI: <input type="text" name="num"/><br>
        <input type="submit" />
        </form>
        EOD;
    }else{
        $num=$_REQUEST['num'];
        echo 'La letra del DNI es : '.calcularLetra($num);
        echo '<br>';
        echo 'El DNI final seria: '. $num.calcularLetra($num);
    }

    function calcularLetra($dni){
        $letra= substr("TRWAGMYFPDXBNJZSQVHLCKE", $dni%23,1);
        return $letra;}
        

    ?>
</body>
</html>