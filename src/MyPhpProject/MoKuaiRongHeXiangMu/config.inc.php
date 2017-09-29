<?php
	$PHP_SELF=$_SERVER['PHP_SELF'];
	$pathUrl='http://'.$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strrpos($PHP_SELF,'/')+1);

	$dirName=dirname(__FILE__);

	

	$avatarUrl=$serverUrl."/MyProject/src/MyPhpProject/MoKuaiRongHeXiangMu/avatar/";

	$pathRoot='http://'.$_SERVER['HTTP_HOST'].'/MyProject/src/MyPhpProject/MoKuaiRongHeXiangMu/';


?>