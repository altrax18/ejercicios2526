<?php
class Circulo extends Figura
{

    public function __construct($color, $tamano)
    {
        parent::__construct($color, $tamano);
    }

    public function __toString()
    {
        return parent::__toString() . " Círculo" .
            ", Radio : " . $this->tamano .
            ", Color: " . $this->color .
            ", Área: " . $this->area() .
            ", Perímetro: " . $this->perimetro();
    }

    public function area()
    {
        return pi() * pow($this->tamano, 2);
    }

    public function perimetro()
    {
        return 2 * pi() * $this->tamano;
    }

    public function dibujar()
    {

        $diametro = $this->tamano * 2;
        $img = imagecreatetruecolor($diametro + 20, $diametro + 20);

        list($r, $g, $b) = sscanf($this->color, "#%02x%02x%02x");
        $color = imagecolorallocate($img, $r, $g, $b);
        $blanco = imagecolorallocate($img, 255, 255, 255);

        imagefill($img, 0, 0, $blanco);
        imagefilledellipse(
            $img,
            $this->tamano + 10,
            $this->tamano + 10,
            $diametro,
            $diametro,
            $color
        );

        imagepng($img);
        imagedestroy($img);
    }

}


?>