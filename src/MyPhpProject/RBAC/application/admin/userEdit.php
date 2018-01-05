<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");
    $uid=$_GET["id"]; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理后台——用户信息修改</title>
	<?php  @include("./include/styleScript.php");?>

	<link  type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/js/webuploader/webuploader.css">
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/webuploader/webuploader.js"></script>
	<script type="text/javascript">
		var static_path="<?php echo STATIC_PATH; ?>";
	</script>
	
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/admin/js/upload.js"></script>
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/layer/layer.js"></script>



	

</head>
<body>
	<?php
        include("./include/header.php");
    ?>
	
	 <div class="com-layout-container">
			<div class="com-layout-aside">
				<div class="aside-nav-list">
				    <?php
                        include("./include/aside.php");
                        echo  dispalyAside($asideData,$action); 
                    ?>
			    </div>
			</div>
			<div class="com-layout-content">
				<div class="bread-nav-box">
					<p class="tit">用户信息修改</p>
				</div>
				<div class="ml20 mr20 pt30 bg-fff">
					<div class="user-edit-form">
					<?php
						$sql="select username,email,phone,avatar,rid,role.name from user inner join user_role on user.id=user_role.uid inner join role on user_role.rid=role.id where user.id='$uid'";
						$result=$mysqli->query($sql);
						$resData=$result->fetch_assoc();

						$roleSql="select * from role";
						$roleResult=$mysqli->query($roleSql);
						while($row=$roleResult->fetch_assoc()){
							$roleResData[]=$row;
						}
					?>
						<form class="form-horizontal" action="userEditDo.php" method="post">
							<div class="form-group">
						        <label class="col-sm-1 control-label">用户名</label>
						        <div class="col-sm-5">
						          <input type="text" class="form-control" placeholder="用户名" value="<?php echo $resData['username'] ?>" name="username">
						        </div>
						    </div>

						    <div class="form-group">
						        <label class="col-sm-1 control-label">密码</label>
						        <div class="col-sm-5">
						          	<div class="pwd">
										<span>**********</span>
						          		<a href="#">修改</a>
						          	</div>
						        </div>
						    </div>

						    <div class="form-group">
						        <label class="col-sm-1 control-label">角色</label>
						        <div class="col-sm-5">
						          	<select class="form-control" name="role">
										<?php
											$roleItemStr="";
											foreach ($roleResData as $key => $value) {
												if($value['id']==$resData["rid"]){
													$roleItemStr.="<option selected value='".$value['id']."'>".$value["name"]."</option>";
												}else{
													$roleItemStr.="<option value='".$value['id']."'>".$value["name"]."</option>";
												}
											}
											echo $roleItemStr;
										?>
						          	</select>
						        </div>
						    </div>
							

							<div class="form-group">
						        <label class="col-sm-1 control-label">手机</label>
						        <div class="col-sm-5">
						          <input type="text" class="form-control" placeholder="手机" value="<?php echo $resData['phone']; ?>" name="phone" >
						        </div>
						    </div>


						    <div class="form-group">
						        <label class="col-sm-1 control-label">邮箱</label>
						        <div class="col-sm-5">
						          <input type="text" class="form-control" placeholder="邮箱" value="<?php echo $resData['email']; ?>" name="email">
						        </div>
						    </div>


						    <div class="form-group">
						        <label class="col-sm-1 control-label">头像</label>
						        <div class="col-sm-5">
						         	<div class="com-upload-single-box">
						         		
											<div class="no-pic" id="J_no-pic" style="<?php echo !$resData['avatar'] ? "display:block" :"display:none"; ?>"></div>
											
									
											<ul class="uploading-img-list clearfix" id="J_uploader-list" style="<?php echo !!$resData['avatar'] ? "display:block" :"display:none"; ?>">
												<li>
													<div class="img-wrap"><img src="<?php echo STATIC_PATH.$resData["avatar"];?>"></div>	
												</li>
											</ul>
										
										
										<div class="upload-btn-group clearfix">
											<div id="filePicker" class="filepicker-container"></div>
											<a href="#" class="btn btn-success uploader-server-btn">从服务器端选择</a>
										</div>										
									</div>
						        </div>
						        <input type="hidden" name="avatarfile" id="J_avatarfile" value="<?php echo $resData['avatar'] ?>">
						    </div>
							
						    <div class="form-group">
						        <label class="col-sm-1"></label>
						        <div class="col-sm-5">
						          	<input type="submit" value="保存" class="btn btn-success btn-lg" style="padding-left:50px;padding-right:50px;">
						        </div>
						    </div>

						</form>
						<div class="pb30"></div>
					</div>
				</div>
			</div>

	  </div>
</body>
</html>