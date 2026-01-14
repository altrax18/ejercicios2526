<?php
abstract class Figura {
    protected $color;
    protected $tamano;

    public function __construct($color, $tamano) {
        $this->color = $color;
        $this->tamano = $tamano;
    }

    public function __toString() {
        return "Figura: " ;
    }


}
?>