<?php

class QrTagFrame17 extends QrTagShape {

    public function generate() {
        $color = $this->hex2dec($this->color);
        $font = Yii::getPathOfAlias('system.frames1') . '.ttf';
        $letter = 's';
        $rect = $this->calculateTextBox($letter, $font, ($this->size/1.3)*7, 0);
        $im = imagecreatetruecolor($rect['width'], $rect['width']);
        imagefilledrectangle($im, 0, 0, $rect['width'], $rect['width'], imagecolorallocate($im, $this->bgColorRGB[0], $this->bgColorRGB[1], $this->bgColorRGB[2]));


        $color = imagecolorallocate($im, $color[0], $color[1], $color[2]);

        imagettftext($im, ($this->size/1.3)*7, 0, 0, $rect['top'] - ($rect['width'] / 50), $color, $font, $letter);
//        $frame = $this->generateMarkerFrame($im, false);
        return $im;
//        return $frame;
        
    }

}
?>