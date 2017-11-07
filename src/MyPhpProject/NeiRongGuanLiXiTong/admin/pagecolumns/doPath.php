<?php 


	include("../../config.php");
	include(ROOT_PATH."/include/mysqli.php");
	include(ROOT_PATH."/admin/common/common.func.php");


	$pid=$_POST["pid"];
	$sql="select classpath from mc_columns where classid='$pid'";
	$result=$mysqli->query($sql);
	$results=resultToArray($result);
	$classPath=$results[0]["classpath"];
	$arr=array();
	if((strrpos($classPath,'/')+1) !=strlen($classPath)){
		$flag="/";
		$classPath=$classPath.$flag;
	}
	if($pid==0){
		$arr["classpath"]=STATIC_PATH."/";
	}else{
		$arr["classpath"]=substr($classPath,0,strrpos($classPath,"/")+1);
		// $arr["classpath"]=$results[0]['classpath'].$flag;
	}
	echo json_encode($arr);
?>