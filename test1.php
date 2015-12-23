<?php

error_reporting(-1);

echo "Start QR Generation...\n\n<br><br>";

// ======================= Include required files =======================
include("qrext/QrTag.php");
include("qrext/shapes/QrTagFrameCircle.php");


// ======================= Configuration =======================

$issimple = false;

if($issimple) {
	$dot = 'QrTagDotSquare';
	$frame_dot = 'QrTagFrameDotSquare';
	$frame = 'QrTagFrameSquare';
	$dotColor = '000000';
	$frame_dotColor = '000000';
	$frameColor = '000000';
} else {
	$dot = 'QrTagDot11';
	$frame_dot = 'QrTagFrameDot3';
	$frame = 'QrTagFrameCircle';
	$dotColor = '#3db54b';
	$frame_dotColor = '#3db54b';
	$frameColor = '#1176bc';
}

$backgroundColor = 'FFFFFF';
$show_in_gallery = 0;
$sizestr = "";
$file = getcwd() . DIRECTORY_SEPARATOR . "myqr" . '.png';

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

// ======================= Initialization =======================

$qr = new QrTag();
$qr->bgColor = $backgroundColor;

if (class_exists($frame_dot)) {
	$dotShape = new $dot;
} else {
	$dotShape = new QrTagDotSquare();
}

$dotShape->color = $dotColor;

$dotShape->size = $size;
$qr->text = "Hi....";

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
// ======================= Start Generation =======================
$qr->generate();

echo "End QR Generation...\n\n<br><br>";
echo "Start QR Logo embedding...\n\n<br><br>";

// ======================= Logo embedding ======================= 

$logo_path = getcwd() . DIRECTORY_SEPARATOR . "logo2.jpg";
$qr_path = getcwd() . DIRECTORY_SEPARATOR . "myqr.png";
$qr_final = getcwd() . DIRECTORY_SEPARATOR . "myqr_final.png";

$ext = pathinfo($logo_path, PATHINFO_EXTENSION);

// logo image
switch(strtolower($ext)) {
	case 'png':
		$logoIm = imagecreatefrompng($logo_path);
		break;
	case 'jpg':
		$logoIm = imagecreatefromjpeg($logo_path);
		break;
	case 'gif':
		$logoIm = imagecreatefromgif($logo_path);
		break;
}

$logoWidth = imagesx($logoIm);
$logoHeight = imagesy($logoIm);

// qr image
$im = imagecreatefrompng($qr_path);
$width = imagesx($im);
$height = imagesy($im);

if($logoWidth > $logoHeight) {
	$ratio = $logoWidth / $logoHeight;
	$newLogoWidth = $width * 0.2;
	$newLogoHeight = $height * 0.2 / $ratio;
}
else {
	$ratio = $logoHeight / $logoWidth;
	$newLogoWidth = $width * 0.2 / $ratio;
	$newLogoHeight = $height * 0.2;
}

//        if($logoWidth < $newLogoWidth && $logoHeight < $newLogoHeight) {
//            $newLogoWidth = $logoWidth;
//            $newLogoHeight = $logoHeight;
//        }

$newLogoIm = imagecreatetruecolor($newLogoWidth, $newLogoHeight);
imagecopy ($newLogoIm, $im, 0, 0, $width/2 - $newLogoWidth/2, $height/2 - $newLogoHeight/2, $newLogoWidth, $newLogoHeight);
imagecopyresized($newLogoIm, $logoIm, 0, 0, 0, 0, $newLogoWidth, $newLogoHeight, $logoWidth, $logoHeight);
imagecopymerge($im, $newLogoIm, $width/2 - $newLogoWidth/2, $height/2 - $newLogoHeight/2, 0, 0, $newLogoWidth, $newLogoHeight, 100);
imagepng($im, $qr_final);

echo "End QR Logo embedding...\n\n<br><br>";
?>