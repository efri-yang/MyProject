<?php
	
	include("./common/session.php");
	include("./config.inc.php");
	include("./common/mysqli.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<script type="text/javascript" src="staitc/js/jquery/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="staitc/js/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="staitc/js/bootstrap/css/bootstrap.css">


    <link rel="stylesheet" type="text/css" href="staitc/css/base.css">


    <link rel="stylesheet" type="text/css" href="staitc/css/style.css">
</head>
<body>
	
	<?php 
		include("./template/header_top.php");
	 ?>

	<div class="container">
		<ul class="cnav">
			<li><a href="index.php">首页</a></li>
			<li><a href="./modules/fileManager/index.php">文件管理</a></li>
			<li><a href="#">图片水印</a></li>
			<li><a href="./modules/imageEJZ/read.php">图片二进制存储</a></li>
		</ul>
	</div>

</body>
</html>