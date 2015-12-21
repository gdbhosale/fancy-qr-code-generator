<?php

class QrTagDotLineV extends QrTagShape {

    public function generate() {
        $color = $this->hex2dec($this->color);
        $im = imagecreatetruecolor($this->size, $this->size);
        imagefill($im, 0, 0, imagecolorallocatealpha($im, $color[0], $color[1], $color[2], 127));
        $color = imagecolorallocate($im, $color[0], $color[1], $color[2]);
        imagefilledrectangle($im, $this->size*0.1,  0, $this->size - $this->size*0.1, $this->size, $color);
        $this->image = $im;
        $this->markerSize = $this->size/1.01;
        return $im;
    }

}
