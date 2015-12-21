<?php

class QrTagDot19 extends QrTagEffect {

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
        $this->imAlone = $squareImg->image;
    }

}

?>