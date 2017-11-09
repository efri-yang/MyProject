<?php
	session_start();
	include("../../config.php");
	include(ROOT_PATH."/include/mysqli.php");
	include(ROOT_PATH."/admin/common/session.php");
	include(ROOT_PATH."/admin/common/common.func.php");


	$newId=$_REQUEST["id"];


	$sql="delete from mc_article where id='$newId'";
	$result=$mysqli->query($sql);

	if($mysqli->affected_rows){
		handleResult(1,"删除成功！","index.php",3);
	}else{
		handleResult(0,"删除失败！","index.php");
	}




?>