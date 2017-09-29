<?php	
	$userId=$_SESSION["userid"];
	$db->where("id",$userId);
	$result=$db->getOne("user");
?>
<div class="coms-header-top">
	<div class="container">
		 <div class="avatar">
			<a href="<?php echo $pathRoot; ?>userInformation.php?userid=<?php echo $result['id'];?>">
				<span class="name"><?php echo $result["username"]; ?></span>
				<span class="pic"><img src="<?php echo !!$result["avatar"] ? $avatarUrl.$result["avatar"] :$avatarUrl.'default_avatar.jpg' ?>"></span>
			</a>
		
		 </div>
	</div>
</div>