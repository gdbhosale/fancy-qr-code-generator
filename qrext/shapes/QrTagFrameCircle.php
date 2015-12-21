<?php

require_once realpath(dirname(__FILE__) . '/../imageSmoothArc.php');

class QrTagFrameCircle extends QrTagShape {

    public function generate() {
        $color = $this->hex2dec($this->color);
        $color[] = 0;

        $tmp = imagecreatetruecolor($this->size, $this->size);
        imagefill($tmp, 0, 0, imagecolorallocatealpha($tmp, $this->bgColorRGB[0], $this->bgColorRGB[1], $this->bgColorRGB[2], 127));
        imageSmoothArc($tmp, $this->size / 2, $this->size / 2, $this->size * 0.7, $this->size * 0.7, $color, 0, M_PI * 2);
        $frame = $this->generateMarkerFrame($tmp, false);

        return $frame;
    }

}
