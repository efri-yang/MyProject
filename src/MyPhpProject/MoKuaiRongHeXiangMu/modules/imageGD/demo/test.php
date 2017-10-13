<?php
	$src="../images/01.jpg";

	$imgInfo=getimagesize($src);

	$imageMime=$imgInfo['mime'];

	$imageSuffix=image_type_to_extension($imgInfo[2],false);


	$func1="imagecreatefrom{$imageSuffix}";

	$image=$func1($src); //创建图像标识符


    $font="./msyh.ttc";

    $white = imagecolorallocate($image, 255, 255, 255);
	$grey = imagecolorallocate($image, 128, 128, 128);
	$black = imagecolorallocate($image, 0, 0, 0);


	$whiteO =imagecolorallocatealpha($image, 255, 255, 255,75);
	$greyO= imagecolorallocatealpha($image, 128, 128, 128,75);
	$blackO = imagecolorallocatealpha($image, 0, 0, 0,75);

	$stampW=200;
	$stampH=100;
	$stampBg=imagecreatetruecolor($stampW, $stampH);

	imagefilledrectangle($stampBg, 0, 0, imagesx($stampBg),imagesy($stampBg),$blackO);
	

	// $text1="杨艺辉520";
	// $text1="杨艺辉5201314";
 //    imagettftext($image,20,0, 20, 20,$white,$font,$text1);






	


	




	header("content-type:image/jpeg");
	imagepng($image);
	imagedestroy($image);
?>