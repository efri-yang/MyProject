<?php
	
	$userId=$_SESSION["userid"];
	$sql="select * from admin where id='".$userId."'";
	$result=$mysqli->query($sql);
	$resultData=resultToArray($result);


?>
<div class="coms-header-top">
	<div class="container">
		 <div class="avatar">
			<a href="<?php echo STATIC_PATH; ?>/admin/userInformation.php?userid=<?php echo $resultData[0]['id'];?>">
				<span class="name"><?php echo $resultData[0]["username"]; ?></span>
				<span class="pic"><img src="<?php echo !!$resultData[0]["avatar"] ? STATIC_PATH."/uploads/avatar/".$resultData[0]["avatar"] :STATIC_PATH."//admin/static/images/pagecolumn/".'default_avatar.jpg' ?>"></span>
			</a>
			<a href="<?php echo STATIC_PATH; ?>/admin/loginOut.php" class="loginout">退出</a>
		 </div>
	</div>
</div>


