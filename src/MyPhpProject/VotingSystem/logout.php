<?php
	session_start();
	$userId=$_SESSION["id"];
	if(!isset($userId)){
		echo "<script>javascript:history.back(1);</script>";
?>
<?php
	}else{
		unset($_SESSION["id"]);
		session_destroy();
?>	
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title></title>
		</head>
		<body>
		 	<h1>您已经退出登录状态</h1>
		 	<p>3s 后自动跳转！</p>
		 	<script>
		 		setTimeout(function(){
		 			history.back(-1);
		 		},3000)
		 	</script>
		</body>
		</html>
<?php		
	}
?>