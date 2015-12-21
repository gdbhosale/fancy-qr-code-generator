<?php

class QrTagDot18 extends QrTagEffect {

    public function generate() {

        $squareImg = new QrTagDotSquare();
        $squareImg->size = $this->size;
        $squareImg->color = $this->color;
        $squareImg->generate();
        
        $this->imSquare = $squareImg->image;

        // right
        $color = $this->hex2dec($this->color);
        $this->imRight = ModuleResizeAndColorize::apply(dirname(__FILE__) . '/images/' . __CLASS__ . '/right.png', $this->size, $color[0], $color[1], $color[2]);

        // left
        $color = $this->hex2dec($this->color);
        $this->imLeft = ModuleResizeAndColorize::apply(dirname(__FILE__) . '/images/' . __CLASS__ . '/left.png', $this->size, $color[0], $color[1], $color[2]);

        // up
        $color = $this->hex2dec($this->color);
        $this->imUp = ModuleResizeAndColorize::apply(dirname(__FILE__) . '/images/' . __CLASS__ . '/up.png', $this->size, $color[0], $color[1], $color[2]);

        // down
        $color = $this->hex2dec($this->color);
        $this->imDown = ModuleResizeAndColorize::apply(dirname(__FILE__) . '/images/' . __CLASS__ . '/down.png', $this->size, $color[0], $color[1], $color[2]);

        
        // top left
        $this->imTopLeft = $squareImg->image;
        
        // bottom left
        $this->imBottomLeft = $squareImg->image;

        // bottom right
        $this->imBottomRight = $squareImg->image;

        // top right
        $this->imTopRight = $squareImg->image;

        // alone
        $color = $this->hex2dec($this->color);
        $font = Yii::getPathOfAlias('system.edges') . '.ttf';
        $letter = 'f';
        $rect = $this->calculateTextBox($letter, $font, $this->size, 0);
        $this->imAlone = imagecreatetruecolor($rect['width'], $rect['width']);
        imagesavealpha($this->imAlone, true);
        $trans_colour = imagecolorallocate($this->imAlone, $this->bgColorRGB[0], $this->bgColorRGB[1], $this->bgColorRGB[2]);
        imagefill($this->imAlone, 0, 0, $trans_colour);
        $color = imagecolorallocate($this->imAlone, $color[0], $color[1], $color[2]);
        imagettftext($this->imAlone, $this->size / 1.33, 0, 0, $rect['top'] + ($rect['width'] / 2) - ($rect['width'] / 1.37), $color, $font, $letter);
        
        $this->markerSize = $rect['width'] / 1.33;
    }

}
?>