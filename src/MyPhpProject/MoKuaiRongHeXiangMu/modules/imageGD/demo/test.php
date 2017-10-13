<?php
	include("./imageftcenter.func.php");
	$src="../images/01.jpg";

	$imgInfo=getimagesize($src);

	$imageMime=$imgInfo['mime'];

	$imageSuffix=image_type_to_extension($imgInfo[2],false);


	$func1="imagecreatefrom{$imageSuffix}";

	$image=$func1($src); //创建图像标识符


    $font="./msyh.ttc";
    $fontSize=20;
    $angle=0;

    $white = imagecolorallocate($image, 255, 255, 255);
	$grey = imagecolorallocate($image, 128, 128, 128);
	$black = imagecolorallocate($image, 0, 0, 0);


	$whiteO =imagecolorallocatealpha($image, 255, 255, 255,75);
	$greyO= imagecolorallocatealpha($image, 128, 128, 128,75);
	$blackO = imagecolorallocatealpha($image, 0, 0, 0,75);

	$text1="杨艺辉520";
	$text2="杨艺辉5201314";

	$stampW=400;
	$stampH=100;
	$stampBg=imagecreatetruecolor($stampW, $stampH);

	imagefilledrectangle($stampBg, 0, 0, imagesx($stampBg),imagesy($stampBg),$blackO);

	list($x)=ImageFTCenter($stampBg,$fontSize,$angle,$font,$text1);
	imagettftext($stampBg,20,0,$x, 30,$white,$font,$text1);
	list($x)=ImageFTCenter($stampBg,$fontSize,$angle,$font,$text2);
	imagettftext($stampBg,20,0, $x, 60,$white,$font,$text2);

	imagecopymerge($image,$stampBg,imagesx($image)-$stampW, imagesy($image)-$stampH, 0, 0, $stampW, $stampH, 50);



	// $text1="杨艺辉520";
	// $text1="杨艺辉5201314";
 //    imagettftext($image,20,0, 20, 20,$white,$font,$text1);






	


	




	header("content-type:$imageMime");
	imagepng($image);
	imagedestroy($image);
?>