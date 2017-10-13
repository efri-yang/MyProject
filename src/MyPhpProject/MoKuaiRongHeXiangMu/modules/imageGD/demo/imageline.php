<?php
	$width=200;
	$height=50;

	$image=imagecreatetruecolor($width, $height);
	$bgcolor='0xFFFFFF';

	imagerectangle($image, 0,0, 100,30,$bgcolor);
	// imagefilledrectangle($image, 0, 0, $width-1, $height-1,$bgcolor);


	// $x1=$y1=0;
	// $x2=$y2=$height-1;

	// $color='0xCCCCCC';
	// imageline($image, $x1, $y1, $x2, $y2, $color);
	
	header('Content-type:image/png');
	ImagePNG($image);
	imagedestroy($image);
?>