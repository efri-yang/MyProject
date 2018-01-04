<?php
    $sql="select * from user where id='$userId'";
    $result=$mysqli->query($sql);
    $userInfoData=$result->fetch_assoc();
?>
  <div class="com-layout-header">
	<p class="header-top-tit">管理后台</p>
	<div class="header-top-avatar">
		<div class="avatar-info">
			<a href="userInfo.php?id=<?php echo $userInfoData['id']; ?>" class="clearfix">
				<div class="pic">
                    <?php
                        if($userInfoData["avatar"]){
                    ?>
                            <img src="<?php echo STATIC_PATH.$userInfoData["avatar"];?>">
                    <?php
                        }else{
                    ?>
                            <img src="<?php echo STATIC_PATH;?>/public/static/common/images/common/default_avatar.jpg">
                    <?php
                        }
                    ?>
                   
                </div>
				<p class="txt"><?php echo $userInfoData['username']; ?></p>
			</a>
		</div>
		<div class="avatar-handle">
			<a href="userEdit.php?id=<?php echo $userInfoData['id']; ?>">信息修改</a>
			<a href="loginout.php?id=<?php echo $userInfoData['id']; ?>">退出</a>
		</div>
	</div>
  </div>