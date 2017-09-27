<?php
	include("./lib/MysqliDb.php");
	date_default_timezone_set('PRC');//设置中国时区

	$username=$_POST["username"];//用户名
	$pwd=$_POST["pwd"];//密码
	$confirmPwd=$_POST["confirmPwd"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$sex=$_POST["sex"];
	$occupation=implode($_POST["occupation"],","); //职业


	//前台要验证 后端也要验证
	

	if(empty($username) || strlen($username) < 3 || strlen($username) >16){
		echo "xxxx";
	}else{
		echo "xxxccc";
	}

?>