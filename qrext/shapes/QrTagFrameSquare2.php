<?php


class QrTagFrameSquare2 extends QrTagShape {

    public function generate() {
        $color = $this->hex2dec($this->color);

        $tmp = imagecreatetruecolor($this->size, $this->size);
        imagefilledrectangle($tmp, 0, 0, $this->size, $this->size, imagecolorallocate($tmp, $this->bgColorRGB[0], $this->bgColorRGB[1], $this->bgColorRGB[2]));
        imagefilledrectangle($tmp, 0, 0, $this->size - $this->size * 0.1, $this->size - $this->size * 0.1, imagecolorallocate($tmp, $color[0], $color[1], $color[2]));
        $frame = $this->generateMarkerFrame($tmp);

        return $frame;
    }

}
