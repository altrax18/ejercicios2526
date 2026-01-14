<?php

require_once 'autoload.php';

$connect = new DBconnection();

$connect->getConnect();
header("Location: comprar.php");

?>