<?php
class Cuadrado extends Figura
{

    public function __construct($color, $tamano)
    {
        parent::__construct($color, $tamano);
    }

    public function __toString()
    {
        return parent::__toString() . " Cuadrado " .
            ", Lado : " . $this->tamano .
            ", Color: " . $this->color .
            ", Área: " . $this->area() .
            ", Perímetro: " . $this->perimetro();
    }

    public function area()
    {
        return pow($this->tamano, 2);
    }

    public function perimetro()
    {
        return 4 * $this->tamano;
    }

    public function dibujar()
    {

        $img = imagecreatetruecolor($this->tamano + 20, $this->tamano + 20);

        list($r, $g, $b) = sscanf($this->color, "#%02x%02x%02x");
        $color = imagecolorallocate($img, $r, $g, $b);
        $blanco = imagecolorallocate($img, 255, 255, 255);

        imagefill($img, 0, 0, $blanco);
        imagefilledrectangle($img, 10, 10, 10 + $this->tamano, 10 + $this->tamano, $color);

        imagepng($img);
        imagedestroy($img);
    }

}
?>