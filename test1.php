<?php

error_reporting(-1);

echo "Start";
include("qrext/QrTag.php");

$dot = 'QrTagDotSquare';
$frame_dot = 'QrTagFrameDotSquare';
$frame = 'QrTagFrameSquare';
$dotColor = '000000';
$frame_dotColor = '000000';
$frameColor = '000000';
$backgroundColor = 'ffffff';
$show_in_gallery = 0;
$sizestr = "large";
$file = Yii::getPathOfAlias('webroot.tmp') . DIRECTORY_SEPARATOR . $fileName . '.png';

switch ($sizestr) {
	case 'medium':
		$size = 30;
		break;
	case 'large':
		$size = 50;
		break;
	case 'xlarge':
		$size = 60;
		break;
	default:
		$size = 14;
		break;
}

$qr = new QrTag();
$qr->bgColor = "#FFFFFF";

if (class_exists($frame_dot)) {
	$dotShape = new $dot;
} else {
	$dotShape = new QrTagDotSquare();
}

$dotShape->color = $dotColor;

$dotShape->size = $size;
$qr->text = $tag_url;

$qr->setDot($dotShape);

if (class_exists($frame_dot)) {
	$qr->frameDot = new $frame_dot;
} else {
	$qr->frameDot = new QrTagFrameDotSquare();
}

$qr->frameDot->color = $frame_dotColor;

if (class_exists($frame_dot)) {
	$qr->frame = new $frame;
} else {
	$qr->frame = new QrTagFrameSquare();
}

$qr->frame->color = $frameColor;
$qr->file = $file;
$qr->generate();

echo "End";
?>