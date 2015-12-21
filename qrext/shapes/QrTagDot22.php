<?php

class QrTagDot22 extends QrTagEffect {

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
        $color = $this->hex2dec($this->color);
        $this->imTopLeft = ModuleResizeAndColorize::apply(dirname(__FILE__) . '/images/' . __CLASS__ . '/topLeft.png', $this->size, $color[0], $color[1], $color[2]);

        // top right
        $color = $this->hex2dec($this->color);
        $this->imTopRight = ModuleResizeAndColorize::apply(dirname(__FILE__) . '/images/' . __CLASS__ . '/topRight.png', $this->size, $color[0], $color[1], $color[2]);

        // bottom left
        $color = $this->hex2dec($this->color);
        $this->imBottomLeft = ModuleResizeAndColorize::apply(dirname(__FILE__) . '/images/' . __CLASS__ . '/bottomLeft.png', $this->size, $color[0], $color[1], $color[2]);

        // bottom right
        $color = $this->hex2dec($this->color);
        $this->imBottomRight = ModuleResizeAndColorize::apply(dirname(__FILE__) . '/images/' . __CLASS__ . '/bottomRight.png', $this->size, $color[0], $color[1], $color[2]);

        // alone
        $color = $this->hex2dec($this->color);
        $this->imAlone = ModuleResizeAndColorize::apply(dirname(__FILE__) . '/images/' . __CLASS__ . '/alone.png', $this->size, $color[0], $color[1], $color[2]);
    }

}

?>