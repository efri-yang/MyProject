<?php
    $sql="select user.id as userid, user.username,avatar,user_role.rid,role.pid,group_concat(perssion_role.pid) as perId,group_concat(perssion.url) from user inner join user_role on user.id=user_role.uid inner join role on role.id=user_role.rid inner join perssion_role on perssion_role.rid=user_role.rid inner join perssion on perssion.id=perssion_role.pid   where user.id='$userid' group by(userid)";
    $result=$mysqli->query($sql);
    $userInfoData=$result->fetch_assoc();

    print_r($userInfoData);


    
?>
  <div class="com-layout-header">
	<p class="header-top-tit">管理后台</p>
	<div class="header-top-avatar">
		<div class="avatar-info">
			<a href="userInfo.php?id=<?php echo $userInfoData['userid']; ?>" class="clearfix">
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
			<a href="userEdit.php?id=<?php echo $userInfoData['userid']; ?>">信息修改</a>
			<a href="loginout.php?id=<?php echo $userInfoData['userid']; ?>">退出</a>
		</div>
	</div>
  </div>