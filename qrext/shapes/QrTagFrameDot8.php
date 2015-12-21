<?php

class QrTagFrameDot8 extends QrTagShape {

    public function generate() {
        $color = $this->hex2dec($this->color);
        
        $font = Yii::getPathOfAlias('system.markerdot1') . '.ttf';
        $letter = 'h';
        $rect = $this->calculateTextBox($letter, $font, ($this->size/1.4) * 3, 0);
//        $rect['width'] += 1;
        $im = imagecreatetruecolor($rect['width'], $rect['width']);
        imagesavealpha($im, true);
        $trans_colour = imagecolorallocatealpha($im, 0, 0, 0, 127);
        imagefill($im, 0, 0, $trans_colour);

        $color = imagecolorallocate($im, $color[0], $color[1], $color[2]);

        imagettftext($im, ($this->size/1.4) * 3, 0, 0, $rect['top'] + ($rect['width'] / 2) - ($rect['width'] / 2), $color, $font, $letter);
        
//        $this->attachMarkerDot($frame, $im);
        return $im;
    }

}
?>