<?php
	session_start();
	include("../libs/mysql.func.php");
	$adminId=$_SESSION["aId"];
	if(!isset($adminId)){
		header("Location:adminlogin.php");
	}
	$title=addslashes($_POST["title"]);

	// $content=htmlentities(addslashes($_POST["context"]));
	$content=htmlentities($_POST["context"]);
	if(empty($_GET["id"])){
		$sql="insert into notice(title,content,admin_id) values('$title','$content','$adminId')";
	}else{
		$nid=$_GET["id"];
		$sql="UPDATE notice SET  title='$title',content='$content' where id='$nid'";
		
	}
	
	$result=$mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="./css/base.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php
		if($mysqli->affected_rows){
	?>
			<h1> <?php echo isset($_GET["id"]) ? "修改成功！" : "插入成功";  ?></h1>
			<p><a href="index.php?paget=notice">查看列表</a> <a href="index.php?paget=addnotice">继续添加</a></p>
	<?php
		}else{
	?>
			<h1>插入失败！</h1>
			<script>
				// window.history.go(-1);
			</script>
	<?php
		}
	?>
</body>
</html>