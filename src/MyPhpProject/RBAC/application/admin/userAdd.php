<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");
    $urlFileName=getUrlFileName();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理后台——添加用户</title>
	<?php  @include("./include/styleScript.php");?>

	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/layer/layer.js"></script>
</head>
<body>
	<?php
		checkPermission($userId,$urlFileName);
	?>
	<?php
        include("./include/header.php");
    ?>
	<div class="com-layout-container">
			<div class="com-layout-aside">
				<div class="aside-nav-list">
				    <?php
                        include("./include/aside.php");
                        echo  dispalyAside($asideData,$urlFileName); 
                    ?>
			    </div>
			</div>
			<div class="com-layout-content">
				<div class="bread-nav-box">
					<p class="tit">添加用户</p>
				</div>
				<div class="ml20 mr20 pt30 bg-fff">
					<div class="user-edit-form">
						<form class="form-horizontal" action="userAddDo.php" method="post">
							<div class="form-group">
						        <label class="col-sm-1 control-label">用户名</label>
						        <div class="col-sm-5">
						          <input type="text" name="username" class="form-control" placeholder="用户名">
						        </div>
						    </div>

						    <div class="form-group">
						        <label class="col-sm-1 control-label">密码</label>
						        <div class="col-sm-5">
						          	<div class="pwd">
										<input type="password" name="password" class="form-control" placeholder="密码">
						          	</div>
						        </div>
						    </div>
							<?php
								
								$roleSql="select * from role";
								$roleResult=$mysqli->query($roleSql);
								while($row=$roleResult->fetch_assoc()){
									$roleResData[]=$row;
								}
							?>
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
						          <input type="text" name="phone" class="form-control" placeholder="手机">
						        </div>
						    </div>


						    <div class="form-group">
						        <label class="col-sm-1 control-label">邮箱</label>
						        <div class="col-sm-5">
						          <input type="text" name="email" class="form-control" placeholder="邮箱">
						        </div>
						    </div>


						    <div class="form-group">
						        <label class="col-sm-1"></label>
						        <div class="col-sm-5">
						          	<input type="submit" value="添加" class="btn btn-success">
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