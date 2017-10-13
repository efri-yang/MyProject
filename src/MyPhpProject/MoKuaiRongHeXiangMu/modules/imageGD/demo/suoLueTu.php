<?php
	$filename="../images/01.jpg";
	$scale=0.8;

	$image=imagecreatefromjpeg($filename);

	$thumbnail=imagecreatetruecolor(imagesx($image)*$scale, imagesy($image)*$scale);




	imagecopyresampled($thumbnail,$image, 0, 0, 0,0,imagesx($thumbnail), imagesy($thumbnail), imagesx($image), imagesy($image));

	header('Content-type:image/jpeg');
	imagejpeg($thumbnail);
	imagedestroy($image);
	imagedestroy($thumbnail);



?>