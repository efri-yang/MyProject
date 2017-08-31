<?php
	session_start();
	include("conn/conn.php");
	$username=$_POST["username"];
	$password=md5($_POST["password"]);
	if(empty($username) || empty($password)){
		header("Location:login.html");
	}
	$sql="select * from user where username='$username' and password='$password'";

	

	$result=mysql_query($sql,$conn);
	if(!mysql_num_rows($result)){
		header("Location:login.html");
		exit();
	}
	$row=mysql_fetch_assoc($result);
	$_SESSION["id"]=$row["user_id"];
	
	header("Location:index.php");

?>