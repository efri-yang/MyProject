<?php
	$mysqli=new mysqli("localhost","root","yyh","voting");
	if($mysqli->connect_errno){
		printf("Connect failed: %s\n", $mysqli->connect_error);
    	exit();
	}
	$mysqli->query("set names 'utf8'");
?>