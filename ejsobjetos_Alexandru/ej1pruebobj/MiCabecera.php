<?php
class MiCabecera {
    private $titulo;

    public function __construct($titulo) {
        $this->titulo = $titulo;
    }

    public function __toString() {
        return "<header style='text-align: center;'><h1>" . $this->titulo . "</h1></header>";
    }

    
}

?>