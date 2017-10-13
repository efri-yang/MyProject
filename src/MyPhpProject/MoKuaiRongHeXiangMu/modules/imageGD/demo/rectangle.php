<?php
	// header ('Content-Type: image/png');
	// $im = @imagecreatetruecolor(120, 20) or die('Cannot Initialize new GD image stream');
	// $text_color = imagecolorallocate($im, 233, 14, 91);
	// imagestring($im, 1, 5, 5,  'A Simple Text String', $text_color);
	// imagepng($im);
	// imagedestroy($im);
	// 
	// 
	// 
	$image=imagecreatetruecolor(200, 100);

	$grey=0xCCCC;
	imagefilledrectangle($image,10,10,200-1, 100-1,$grey);

	$white=0xFFFFFF;
	imagefilledrectangle($image, 50, 10, 150, 40, $white);

	header("Content-type:image/png");
	ImagePNG($image);
	ImageDestroy($image);

?>