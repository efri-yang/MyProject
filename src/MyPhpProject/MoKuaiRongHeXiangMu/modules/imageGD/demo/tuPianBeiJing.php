<?php
	include("./imageftcenter.func.php");
	$src="../images/01.jpg";



	$imgInfo=getimagesize($src);

	$imageMime=$imgInfo['mime'];

	$imageSuffix=image_type_to_extension($imgInfo[2],false);


	$func1="imagecreatefrom{$imageSuffix}";

	$image=$func1($src); //创建图像标识符


	$syPic="../images/bowl_logo.png";
	$syInfo=getimagesize($syPic);
	$sySuffix=image_type_to_extension($syInfo[2],false);
	$func2="imagecreatefrom{$sySuffix}";
	$syImage=$func2($syPic);



	imagecopy($image, $syImage,imagesx($image)-imagesx($syImage)-10,imagesy($image)-imagesy($syImage)-10, 0, 0,imagesx($syImage), imagesy($syImage));


  

	
	



	header("content-type:$imageMime");
	imagepng($image);
	imagedestroy($image);
?>