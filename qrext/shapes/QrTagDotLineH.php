<?php

class QrTagDotLineH extends QrTagShape {

    public function generate() {
        $color = $this->hex2dec($this->color);
        $im = imagecreatetruecolor($this->size, $this->size);
        imagefill($im, 0, 0, imagecolorallocatealpha($im, $color[0], $color[1], $color[2], 127));
        $color = imagecolorallocate($im, $color[0], $color[1], $color[2]);
        imagefilledrectangle($im, 0,  $this->size*0.1, $this->size, $this->size - $this->size*0.1, $color);
        $this->image = $im;
        $this->markerSize = $this->size/1.01;
        return $im;
    }

}

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

class QrTagDotCircle extends QrTagShape {
    public function generate() {
        $color = $this->hex2dec($this->color);
        $color[] = 0;

        $tmp = imagecreatetruecolor($this->size, $this->size);
        imagefill($tmp, 0, 0, imagecolorallocatealpha($tmp, 0, 0, 0, 127));
        imageSmoothArc($tmp, $this->size/2, $this->size/2, $this->size*0.7, $this->size*0.7, $color, 0, M_PI * 2);

        return $tmp;
    }
}