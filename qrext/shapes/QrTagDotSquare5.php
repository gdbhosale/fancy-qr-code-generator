<?php

class QrTagDotSquare5 extends QrTagShape {

    public function generate() {
        $color = $this->hex2dec($this->color);
        $im = imagecreate($this->size, $this->size);
        imagefill($im, 0 ,0, imagecolorallocate($im, $this->bgColorRGB[0], $this->bgColorRGB[1], $this->bgColorRGB[2]));
        $color = imagecolorallocate($im, $color[0], $color[1], $color[2]);
        imagefilledpolygon($im, array(
            $this->size/2, 0,
            $this->size, $this->size/2,
            $this->size/2, $this->size,
            0, $this->size/2,
        ), 4, $color);
        
        $this->image = $im;
        $this->markerSize = $this->size/1.01;
        return $im;
    }

}
