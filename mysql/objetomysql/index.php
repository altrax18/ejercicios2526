<?php
class animal{  
   public $id;  
   public $tipo;  
   public $nombre;  
   public function capitalizarTipo() {  
     return ucwords($this->tipo);  
   }  
 }  
 try {  
   $dbh = new PDO("mysql:host=$hostname;dbname=libros", $username, $password);  
   $sql = "SELECT * FROM animales";  
   $stmt = $dbh->query($sql);  
   while ($animal = $stmt->fetchObject('animal')) {  
     echo $animal->id . '<br />';  
     echo $animal->capitalizarTipo() . '<br />';  
     echo $animal->nombre;  
   }  
 } catch (PDOException $e) {  
   echo $e->getMessage();  
 }
?>