<?php

class QrTagDotSquare3 extends QrTagShape {

    public function generate() {
        $color = $this->hex2dec($this->color);
        $im = imagecreate($this->size, $this->size);
        imagefill($im, 0 ,0, imagecolorallocate($im, $this->bgColorRGB[0], $this->bgColorRGB[1], $this->bgColorRGB[2]));
        $color = imagecolorallocate($im, $color[0], $color[1], $color[2]);
        imagefilledrectangle($im, 1, 1, $this->size/1.6, $this->size/1.6, $color);
        $im = imagerotate($im, 30, 0);

        $this->image = $im;
        $this->markerSize = $this->size/1.01;
        return $im;
    }

}
