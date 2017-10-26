<?php  
	include("../../Path.php");
	include("../../common/mysqli.php");
	include("../common/common.func.php");
	$id=$_POST['id'];
	$sql="select islast from mc_columns where classid='$id'";
	$result=$mysqli->query($sql);
	$results=resultToArray($result);
	if(!!$results[0]["islast"]){
		echo 1;
	}else{
		echo 0; 	
	}
?>