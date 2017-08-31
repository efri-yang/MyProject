<?php
	
	include("./libs/mysql.func.php");
	$id=$_GET["id"];
	$sql="select admin.username,title,content,wtime from notice inner join admin on admin.id=notice.admin_id where notice.id='$id'";
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
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
	
	<?php include("./tpl/header.php"); ?>
	<div class="container">
		<div class="row" style="padding: 0 30px;">
			<div class="noticeDetail-box">

			<?php
			
				if($result->num_rows){

					$row=$result->fetch_assoc();
						
			?>
						<h1><?php echo $row["title"]; ?></h1>
				<div class="bar">
					<span class="author"><?php echo $row["username"]; ?></span>
					<span class="time"><?php echo date("Y-m-d",$row["wtime"]); ?></span>
				</div>

				<div class="con-txt">
					<?php echo html_entity_decode($row["content"]); ?>
				</div>
			<?php
				}else{
			?>
					<div class="no-notice">文章找不到啦！！</div>

			<?php		
				}
			?>
					

			</div>
		</div>
	</div>
	<?php include("./tpl/footer.php"); ?>

</body>
</html>