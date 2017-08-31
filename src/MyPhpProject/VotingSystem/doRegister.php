<?php 
	include("./libs/mysql.func.php");
	date_default_timezone_set('PRC');


	$username=$_POST["username"];
	$pwd=$_POST["pwd"];
	$confirmPwd=$_POST["confirmPwd"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$sex=$_POST["sex"];
	$occupation=implode($_POST["occupation"],",");

	$regtime=time();
	$regip=$_SERVER['REMOTE_ADDR'];
	echo $regip;
	$validFlag=true;
	if(empty($username) || strlen($username) < 3 || strlen($username) > 16){
		$validFlag=false;
	}else if(empty($pwd) || $pwd!==$confirmPwd || strlen($pwd) < 6 || strlen($pwd) > 16){
		$validFlag=false;
	}else if(empty($email) || !preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((.[a-zA-Z0-9_-]{2,3}){1,2})$/", $email)){
		$validFlag=false;
	}else if(empty($phone) || !preg_match("/^0?1[3|4|5|8][0-9]\d{8}$/",$phone)){
		$validFlag=false;
	}else if(empty($sex)){
		$validFlag=false;
	}else if(empty($occupation)){
		$validFlag=false;
	}
	$pwdMd5=md5($pwd);
	if($sex=="男"){
		$sexInteger=1;
	}else if($sex=="女"){
		$sexInteger=2;
	}else{
		$sexInteger=3;
	}

	
	if($validFlag){
		$sql="insert into user(username,password,email,phone,sex,occupation,reg_time,reg_ip) values ('$username','$pwdMd5','$email','$phone',$sexInteger,'$occupation','$regtime','$regip')";

		$result=$mysqli->query($sql);

		if($mysqli->affected_rows > 0){
			echo '<h1 style="text-align:center;">注册成功！</h1><p style="text-align:center;">本页面将在<span style="color:#FF0000; font-weight:bold;">3</span>秒后跳转</p><script>setTimeout(function(){window.location="login.php"},3000)</script>';
		}else{
			echo '<h1  style="text-align:center;">注册失败！请重新提交</h1><p style="text-align:center;">单机<a href="register.php">注册</a>进行重新注册</p>';
		}
	}else{
		echo "<h1>注册失败！请重新提交</h1><p>单机<a href='register.php'>链接重新注册</a></p>";

	}

	


	


?>