<?php
	include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
	$verifyImage=new VerifyImage();
	$verifyImage->createVerifyImage();

	$_SESSION['captcha']=$verifyImage->captchCode;


?>