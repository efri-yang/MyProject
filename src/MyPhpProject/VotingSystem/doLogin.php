<?php
	session_start();
	include("./libs/mysql.func.php");
	$username=$_POST["username"];
	$pwd=$_POST["pwd"];
	$validFlag=true;
	if(empty($username)){
		$validFlag=false;
	}else if(empty($pwd)){
		$validFlag=false;
	}
	if($validFlag){
		$pwdMd5=md5($pwd);
		if(preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((.[a-zA-Z0-9_-]{2,3}){1,2})$/", $username)){
			$sql="select * from user where email='$username' and password='$pwdMd5'";
		}else{
			$sql="select * from user where username='$username' and password='$pwdMd5'";
		}
		$result=$mysqli->query($sql);
		
		if($result->num_rows){
			$row=$result->fetch_array();
			$_SESSION["id"]=$row["id"];
			echo "xxx";
		}else{
			echo "<h1>用户不存在！</h1>";
		}
	}else{
		echo "<h1>用户据或者密码不能为空！</h1>";
	}
	
?>