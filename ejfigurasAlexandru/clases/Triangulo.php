<?php
class Triangulo extends Figura
{
    private $altura;

    public function __construct($color, $tamano, $altura)
    {
        parent::__construct($color, $tamano);
        $this->altura = $altura;
    }

    public function __toString()
    {
        return parent::__toString() . "Triángulo" .
            ", Base: " . $this->tamano .
            ", Altura: " . $this->altura .
            ", Color: " . $this->color .
            ", Área: " . round($this->area(), 2) .
            ", Perímetro: " . round($this->perimetro(), 2);
    }

    public function area()
    {
        return ($this->tamano * $this->altura) / 2;
    }


    public function perimetro()
    {

        $lado = sqrt(pow($this->tamano / 2, 2) + pow($this->altura, 2));

        return $this->tamano + 2 * $lado;
    }

    public function getAltura()
    {
        return $this->altura;
    }


    public function dibujar()
    {

        $img = imagecreatetruecolor($this->tamano + 20, $this->altura + 20);

        list($r, $g, $b) = sscanf($this->color, "#%02x%02x%02x");
        $color = imagecolorallocate($img, $r, $g, $b);
        $blanco = imagecolorallocate($img, 255, 255, 255);

        imagefill($img, 0, 0, $blanco);

        $puntos = [
            10,
            10 + $this->altura,
            10 + $this->tamano,
            10 + $this->altura,
            10 + ($this->tamano / 2),
            10
        ];

        imagefilledpolygon($img, $puntos, $color);

        imagepng($img);
        imagedestroy($img);
    }
}


?>