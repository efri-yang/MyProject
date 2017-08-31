<?php
	session_start();
	$isLogin=false;
    $isVoted=false;
	include("./libs/mysql.func.php");
	if(isset($_SESSION["id"])){
		$isLogin=true;
		$userId=$_SESSION["id"];
		$sql="select * from user where id='$userId'";
		$result=$mysqli->query($sql);
		if($result->num_rows){
			$row=$result->fetch_array();
		}
	}
	
	$id=$_GET["id"];
	// $sql="select * from titem where tid='$id'";
	$sql="select titem.id,titem.title,theme.title as tit from titem inner join theme on titem.tid='$id' and theme.id='$id'";
	$result=$mysqli->query($sql);
	$rowOne=$result->fetch_assoc();
	$result->data_seek(0);

    //未登录 或者登录已经投过票
	$sqlUser="select user_id from votelist where user_id='$userId' and tid='$id'";
	$resultUser=$mysqli->query($sqlUser);
	if($resultUser->num_rows){
		$isVoted=true;
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
			<div class="row">
				<?php
					if($result->num_rows){
						
				?>

					<div class="vote-detail-box">
						<h2><?php echo $rowOne["tit"]; ?></h2>
						<div class="items">
							<form method="post" action="voteAddDo.php?id=<?php echo $id;  ?>">
				<?php

						while($row=$result->fetch_assoc()){

				?>				
							
							<label><input type="radio" name="options" value="<?php echo $row["id"] ?>" /><?php echo $row["title"] ?></label>
				<?php			
						}							
				?>
			
							<div class="row" style="margin-top: 50px">
								<button type="submit" <?php echo $isLogin ? ($isVoted ? 'disabled' :'') : 'disabled'; ?> id="J_submit" class="btn btn-success">提交</button>
								<?php  
									if($isVoted){
								?>

									<h5 style="color:#f60;font-size: 20px;">您已经投过票了！！</h5>
								<?php		
									}else if(!$isLogin){
								?>
									<h5 style="color:#f60;font-size: 20px;">请先<a href="login.php">登录</a>后在投票！</h5>
								<?php			
									}
								?>
							</div>
							</form>


						</div>
						<div class="row" style="text-align: center;margin-top:50px;">
							 <a href="voteResult.php?id=<?php echo $id; ?>" class="btn btn-success btn-lg">查看投票结果</a>
						</div>
					</div>
				<?php
					}else{
				?>
						<div class="no-databox">该主题暂无数据！</div>
				<?php
					}
				?>
			</div>
	</div>
	
	<div style="height: 300px;"></div>
	<?php include("./tpl/footer.php"); ?>

	<script type="text/javascript">
		$(function(){
			$("#J_submit").on("click",function(event){
				var userId="<?php echo  $userId;?>"
				
				if(!userId){
					alert("请先登录后！！");
					return false;
				}
				
			})

		})

	</script>

</body>
</html>