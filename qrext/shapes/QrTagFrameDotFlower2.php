<?php

require_once realpath(dirname(__FILE__) . '/../imageSmoothArc.php');

class QrTagFrameDotFlower2 extends QrTagShape {

    public function generate() {
        $color = $this->hex2dec($this->color);
        $color[] = 0;

        $im = imagecreatetruecolor($this->size * 3.35, $this->size * 3.35);
        imagefill($im, 0, 0, imagecolorallocatealpha($im, $color[0], $color[1], $color[2], 127));
        $dotSize = 1;
        $movePerct = 0.8;
        imageSmoothArc($im, $this->size * 3.35 / 2, $this->size * 3.35 / 2, $this->size * $dotSize, $this->size * $dotSize, $color, 0, M_PI * 2);
        imageSmoothArc($im, $this->size * 3.35 / 2 - $this->size * $dotSize * $movePerct, $this->size * 3.35 / 2, $this->size * $dotSize, $this->size * $dotSize, $color, 0, M_PI * 2);
        imageSmoothArc($im, $this->size * 3.35 / 2 + $this->size * $dotSize * $movePerct, $this->size * 3.35 / 2, $this->size * $dotSize, $this->size * $dotSize, $color, 0, M_PI * 2);
        imageSmoothArc($im, $this->size * 3.35 / 2, $this->size * 3.35 / 2 + $this->size * $dotSize * $movePerct, $this->size * $dotSize, $this->size * $dotSize, $color, 0, M_PI * 2);
        imageSmoothArc($im, $this->size * 3.35 / 2, $this->size * 3.35 / 2 - $this->size * $dotSize * $movePerct, $this->size * $dotSize, $this->size * $dotSize, $color, 0, M_PI * 2);

        imageSmoothArc($im, $this->size * 3.35 / 2 + $this->size * $dotSize * ($movePerct - 0.2), $this->size * 3.35 / 2 + $this->size * $dotSize * ($movePerct - 0.2), $this->size * $dotSize, $this->size * $dotSize, $color, 0, M_PI * 2);
        imageSmoothArc($im, $this->size * 3.35 / 2 - $this->size * $dotSize * ($movePerct - 0.2), $this->size * 3.35 / 2 - $this->size * $dotSize * ($movePerct - 0.2), $this->size * $dotSize, $this->size * $dotSize, $color, 0, M_PI * 2);
        imageSmoothArc($im, $this->size * 3.35 / 2 - $this->size * $dotSize * ($movePerct - 0.2), $this->size * 3.35 / 2 + $this->size * $dotSize * ($movePerct - 0.2), $this->size * $dotSize, $this->size * $dotSize, $color, 0, M_PI * 2);
        imageSmoothArc($im, $this->size * 3.35 / 2 + $this->size * $dotSize * ($movePerct - 0.2), $this->size * 3.35 / 2 - $this->size * $dotSize * ($movePerct - 0.2), $this->size * $dotSize, $this->size * $dotSize, $color, 0, M_PI * 2);

        return $im;
    }

}
