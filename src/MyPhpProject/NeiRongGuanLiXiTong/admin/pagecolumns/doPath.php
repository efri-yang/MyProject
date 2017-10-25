<?php 

	include("../../common/mysqli.php");
	include("../common/common.func.php");

	$pid=$_POST["pid"];
	$sql="select classpath from mc_columns where classid='$pid'";
	$result=$mysqli->query($sql);
	$results=resultToArray($result);

	echo json_encode($results);
?>