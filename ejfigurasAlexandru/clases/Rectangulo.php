<?php
class Rectangulo extends Figura
{
    private $altura;

    public function __construct($color, $tamano, $altura)
    {
        parent::__construct($color, $tamano);
        $this->altura = $altura;
    }

    public function __toString()
    {
        return parent::__toString() . " Rectángulo" .
            ", Base: " . $this->tamano .
            ", Altura: " . $this->altura .
            ", Color: " . $this->color .
            ", Área: " . $this->area() .
            ", Perímetro: " . $this->perimetro();
    }

    public function area()
    {
        return $this->tamano * $this->altura;
    }

    public function perimetro()
    {
        return 2 * ($this->tamano + $this->altura);
    }

    public function dibujar()
    {

        $img = imagecreatetruecolor($this->tamano + 20, $this->altura + 20);

        list($r, $g, $b) = sscanf($this->color, "#%02x%02x%02x");
        $color = imagecolorallocate($img, $r, $g, $b);
        $blanco = imagecolorallocate($img, 255, 255, 255);

        imagefill($img, 0, 0, $blanco);
        imagefilledrectangle($img, 10, 10, 10 + $this->tamano, 10 + $this->altura, $color);

        imagepng($img);
        imagedestroy($img);
    }

}

?>