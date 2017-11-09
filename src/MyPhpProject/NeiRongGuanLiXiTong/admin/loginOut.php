<?php
	session_start();
	include("../config.php");
	include(ROOT_PATH."/include/mysqli.php");
	include(ROOT_PATH."/admin/common/session.php");
	include(ROOT_PATH."/admin/common/common.func.php");
	unset($_SESSION['userid']);
	if(!isset($_SESSION['userid'])){
		handleResult(1,"退出成功！",STATIC_PATH."/admin/login.php");	
	}	

?>



