<?php
	session_start();
	include("./common/mysqli.php");
	$userId=$_SESSION["userid"];
	$db->where("id",$userId);
	$result=$db->getOne("user");





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
	<div class="coms-header-top">
		<div class="container">
			 <div class="avatar">
				<a href="userInformation.php?userid=<?php echo $result['id'];?>">
					<span class="name"><?php echo $result["username"]; ?></span>
					<span class="pic"><img src="avatar/<?php echo !!$result["avatar"] ? $result["avatar"] :'default_avatar.jpg' ?>"></span>
				</a>
			
			 </div>
		</div>
	</div>

	<div class="container">
		<ul class="cnav">
			<li><a href="#">首页</a></li>
			<li><a href="#">文件管理</a></li>
			<li><a href="#">图片水印</a></li>

		</ul>
	</div>

</body>
</html>