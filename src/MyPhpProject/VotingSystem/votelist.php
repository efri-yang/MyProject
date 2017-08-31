<?php
	session_start();
	include("./libs/mysql.func.php");
	
	if(isset($_SESSION["id"])){
		$userId=$_SESSION["id"];
		$sql="select * from user where id='$userId'";
		$result=$mysqli->query($sql);
		if($result->num_rows){
			$row=$result->fetch_array();
		}
	}
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
			
			
				<div class="tit-type1">投票</div>
				<div class="hvote-box">
					<?php
						$sqltp="select * from theme order by id desc LIMIT 0,10";
						$resulttp=$mysqli->query($sqltp);
						if($resulttp->num_rows){
				    ?>
				    		<ul>
								<?php
								    $num=0;
									while ($rowtp=$resulttp->fetch_assoc()) {
										$num++;
								?>
										<li><span><?php echo $num; ?></span><a href="votedetail.php?id=<?php echo $rowtp['id'];?>"><?php echo $rowtp["title"]; ?></a></li>
								<?php
									}

								?>
				    		</ul>
						
				    <?php
				    }else{
					?>
						<div class="no-databox">暂无投票！</div>
				    <?php	
				    }
				    ?>
					
				</div>
		
	</div>
	<?php include("./tpl/footer.php"); ?>

</body>
</html>

