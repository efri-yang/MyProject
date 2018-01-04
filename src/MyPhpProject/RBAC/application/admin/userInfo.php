<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php"); 
    $action=$_GET["action"];  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理后台用户信息</title>
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/jquery/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/vue/vue.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/css/base.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/js/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/admin.css">
	

<link  type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/js/webuploader/webuploader.css">
<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/webuploader/webuploader.js"></script>

<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/layer/layer.js"></script>


	
</head>
<body>
	<!-- 头部 start -->
	 <?php
        include("./include/header.php");
       
    ?>
	<!-- 头部 end -->
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
						$sql="select username,email,phone,avatar,rid,role.name from user inner join user_role on user.id=user_role.uid inner join role on user_role.rid=role.id where user.id='$userId'";
						$result=$mysqli->query($sql);
						$resData=$result->fetch_assoc();

						$roleSql="select * from role";
						$roleResult=$mysqli->query($roleSql);
						while($row=$roleResult->fetch_assoc()){
							$roleResData[]=$row;
						}
					?>
						<form class="form-horizontal">
							<div class="form-group">
						        <label class="col-sm-1 control-label">用户名</label>
						        <div class="col-sm-5">
						          <input type="text" class="form-control" placeholder="用户名" value="<?php echo $resData['username'] ?>" disabled>
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
						          	<select class="form-control" disabled>
										<?php
											$roleItemStr="";
											foreach ($roleResData as $key => $value) {
												if($value['id']==$resData["rid"]){
													$roleItemStr.="<option selected>".$value["name"]."</option>";
												}else{
													$roleItemStr.="<option>".$value["name"]."</option>";
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
						          <input type="text" class="form-control" placeholder="手机" value="<?php echo $resData['phone']; ?>" disabled>
						        </div>
						    </div>


						    <div class="form-group">
						        <label class="col-sm-1 control-label">邮箱</label>
						        <div class="col-sm-5">
						          <input type="text" class="form-control" placeholder="邮箱" value="<?php echo $resData['email']; ?>" disabled>
						        </div>
						    </div>


						    <div class="form-group">
						        <label class="col-sm-1 control-label">头像</label>
						        <div class="col-sm-5">
						         	<div class="com-upload-single-box">
										
										<ul class="uploading-img-list clearfix" id="J_uploader-list">
												<li><div class="img-wrap">
													<?php
														if(!!$resData["avatar"]){
													?>
															<img src="<?php echo STATIC_PATH.$resData['avatar'];?>" />
													<?php		
														}else{
													?>
															<img src="<?php echo STATIC_PATH."/public/static/admin/images/common/default_avatar.jpg";?>" />
													<?php		
														}
													?>
												</div></li>
										</ul>
											
									</div>
						        </div>
						    </div>

						    <script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/admin/js/upload.js"></script>


						    <div class="form-group">
						        <label class="col-sm-1"></label>
						        <div class="col-sm-5">
						          	<a href="userEdit.php?id=<?php echo $userId; ?>" class="btn btn-success btn-lg" style="padding-left:50px;padding-right:50px;">编辑</a>
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