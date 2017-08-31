<?php
	session_start();
	$adminId=$_SESSION["aId"];
	if(!isset($adminId)){
		header("Location:adminlogin.php");
	}
	include("../libs/mysql.func.php");
	$id=$_GET["id"];
	echo $id;
	$sql="delete from notice where id='$id'";
	$result=$mysqli->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="./css/base.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.css">
    <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>

    <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../bootstrap/bootstrapvalidator/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="../bootstrap/bootstrapvalidator/js/language/zh_CN.js"></script>
	

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
		<?php
			if($mysqli->affected_rows){
				echo "<h1>删除成功！</h1><script>setTimeout(function(){history.go(-1)},1500)</script>";
			}else{
				echo "<h1>删除失败，请你重新来过！</h1><script>setTimeout(function(){history.go(-1)},1500)</script>";
			}
		
		
					
				
		?>
</body>
</html>