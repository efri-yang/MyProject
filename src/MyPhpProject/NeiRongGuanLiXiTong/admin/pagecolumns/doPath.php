<?php 


	include("../../config.php");
	include(ROOT_PATH."/include/mysqli.php");
	include(ROOT_PATH."/admin/common/common.func.php");


	$pid=$_POST["pid"];
	$sql="select classpath from mc_columns where classid='$pid'";
	$result=$mysqli->query($sql);
	$results=resultToArray($result);

	echo json_encode($results);
?>