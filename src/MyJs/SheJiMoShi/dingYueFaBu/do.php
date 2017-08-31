<?php 
	session_start();
	include("conn/conn.php");
	for($i=0;$i<100000000;$i++){
		$a=10;
	}
	@$sessionId=$_SESSION["id"];
	$arr=array("nologin"=>"true");
	if(@$sessionId){
		$sql="select * from user where user_id='$sessionId'";
		$result=mysql_query($sql,$conn);
		$row=mysql_fetch_assoc($result);
		echo json_encode($row);
	}else{
		echo json_encode($arr);
	}
?>