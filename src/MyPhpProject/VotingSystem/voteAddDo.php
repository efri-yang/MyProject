<?php
	session_start();
	include("./libs/mysql.func.php");
	
	if(isset($_SESSION["id"])){
		$userId=$_SESSION["id"];
	}
	$id=$_GET["id"];
	$selId=$_POST["options"];
    
    $sql="insert into votelist(tid,iid,user_id) values('$id','$selId','$userId')";
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
	
	
	<div class="container">
			<div class="row">
				<?php
					if($mysqli->affected_rows){
				?>
						<h1>投票成功！</h1>
						<script type="text/javascript">
								setTimeout(function(){
									window.location.href="votelist.php";
								},2500)
						</script>	
				<?php
				}else{
				?>
						<h1>投票失败！</h1>
						<script type="text/javascript">
								setTimeout(function(){
									window.location.href="votelist.php";
								},2500)
						</script>	
				<?php	
				}
				?>
			</div>
	</div>
	
	<div style="height: 300px;"></div>
	<?php include("./tpl/footer.php"); ?>

</body>
</html>