<?php
	session_start();
	include("./libs/mysql.func.php");
	
	if(isset($_SESSION["id"])){
		$userId=$_SESSION["id"];
	}else{
		header("Location:login.php");
	}

	$messagecon=$_POST["messagecon"];
	$messagecon=strip_tags(nl2br($messagecon));
	$sql="insert into message (content,user_id) values('$messagecon','$userId')";
	$result=$mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="./styles/base.css">
    <script src="https://cdn.bootcss.com/jquery/1.10.2/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap-theme.css">
    <script type="text/javascript" src="./bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="./styles/style.css">


    <script type="text/javascript" charset="utf-8" src="./UEditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="./UEditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="./UEditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript" src="./bootstrap/bootstrapvalidator/js/bootstrapValidator.js"></script>
<script type="text/javascript" src="./bootstrap/bootstrapvalidator/js/language/zh_CN.js"></script>
</head>
<body>
	
	
	<div class="container">
		<div class="row">
			<?php
				if($mysqli->affected_rows){
			?>
					<h1>留言成功！</h1>
					<script type="text/javascript">
				    	setTimeout(function(){
				    		history.back();
				    	},2500)
				    </script>
			<?php
				}else{
			?>
					<h1>留言失败！</h1>
				    <script type="text/javascript">
				    	setTimeout(function(){
				    		window.history.back();
				    	},2500)
				    </script>
			<?php
				}
			?>
		</div>
	</div>
	

<script type="text/javascript">
	$(function(){
		
		

	})
</script>
</body>
</html>