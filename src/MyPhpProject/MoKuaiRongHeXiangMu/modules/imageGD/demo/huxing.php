<?php 
	$im=imagecreatetruecolor(200, 200);
	$red = imagecolorallocate($im,255,0,0);
	imagearc($im,100,80,120,90,0,120,$red);

	
	header("Content-type: image/png");
	imagepng($im);
	imagedestroy($im);
?>