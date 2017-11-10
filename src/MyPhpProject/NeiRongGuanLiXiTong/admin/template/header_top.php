<?php
	
	$userId=$_SESSION["userid"];
	$sql="select * from admin where id='".$userId."'";
	$resultHeadTop=$mysqli->query($sql);
	$resultHeadData=resultToArray($resultHeadTop);


?>
<div class="coms-layout-top">
		<div class="user-avatar">
			<a href="<?php echo STATIC_PATH; ?>/admin/userInformation.php?userid=<?php echo $resultHeadData[0]['id'];?>">
				<span class="name"><?php echo $resultHeadData[0]["username"]; ?></span>
				<span class="pic"><img src="<?php echo !!$resultHeadData[0]["avatar"] ? STATIC_PATH."/uploads/avatar/".$resultHeadData[0]["avatar"] :STATIC_PATH."//admin/static/images/pagecolumn/".'default_avatar.jpg' ?>"></span>
			</a>
			<a href="<?php echo STATIC_PATH; ?>/admin/loginOut.php" class="loginout">退出</a>
		 </div>
		 <ul class="nav-top">
			<li><a href="<?php echo STATIC_PATH; ?>/admin/index.php">首页</a></li>
			<li><a href="#">系统</a></li>
			<li><a href="<?php echo STATIC_PATH; ?>/admin/pagecolumns/index.php">栏目</a></li>
			<li><a href="<?php echo STATIC_PATH; ?>/admin/pagenews/index.php">信息</a></li>
			<li><a href="#">用户</a></li>
		</ul>
</div>


