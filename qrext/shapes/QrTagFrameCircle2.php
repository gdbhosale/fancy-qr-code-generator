<?php

require_once realpath(dirname(__FILE__) . '/../imageSmoothArc.php');

class QrTagFrameCircle2 extends QrTagShape {
    public function generate() {
        $color = $this->hex2dec($this->color);
        $color[] = 0;
        $bgColorRGB = $this->bgColorRGB;
        $bgColorRGB[] = 0;
        
        $tmp = imagecreatetruecolor($this->size*7.5, $this->size*7.5);
        imagefill($tmp, 0, 0, imagecolorallocatealpha($tmp, 0, 0, 0, 127));
        imageSmoothArc($tmp, $this->size*7.5/2, $this->size*7.5/2, $this->size*6.8, $this->size*6.8, $color, 0, M_PI * 2);
        imageSmoothArc($tmp, $this->size*7.5/2, $this->size*7.5/2, $this->size*7.5*0.7, $this->size*7.5*0.7, $bgColorRGB, 0, M_PI * 2);

        return $tmp;
    }
}
