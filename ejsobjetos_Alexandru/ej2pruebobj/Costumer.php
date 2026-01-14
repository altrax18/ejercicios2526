<?php
class Costumer {
    private $id;
    private $name;
    private $lastname;
    private $email;
    private static $nextId = 1; 

    public function __construct($name, $lastname, $email){
        $this->id = self::$nextId;   
        self::$nextId++;             
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
    }

    public function __toString(){
        return "ID: " . $this->id . 
               " - Nombre: " . $this->name . " " . $this->lastname . 
               " - Email: " . $this->email;
    }
}
?>
