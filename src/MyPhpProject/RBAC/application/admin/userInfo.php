<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php"); 

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

	
</head>
<body>
	<!-- 头部 start -->
	 <?php
        include("./include/header.php");
        print_r($resData);
    ?>
	<!-- 头部 end -->
	 <div class="com-layout-container">
			<div class="com-layout-aside">
				 <ul class="aside-nav-list">
    <li>
        <a href="#">首页</a>
    </li>
    <li class="active">
        <a href="article-list.html">文章管理</a>
        <ul>
            <li><a href="article-list.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;文章列表</a></li>
            <li class="active">
                <a href="article-add.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;添加文章</a>
                <ul>
                    <li class="curr"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;xxx</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;xxxx</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="user-list.html">用户管理</a>
        <ul>
            <li><a href="user-list.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用户列表</a></li>
            <li><a href="user-add.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;添加角色</a></li>
        </ul>
    </li>
    <li>
        <a href="role-list.html">角色管理</a>
        <ul>
            <li><a href="role-list.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;角色列表</a></li>
            <li><a href="role-add.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;添加角色</a></li>
        </ul>
    </li>
    <li>
        <a href="perssion-list.html">权限管理</a>
        <ul>
            <li><a href="perssion-list.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;权限列表</a></li>
            <li><a href="perssion-add.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;添加权限</a></li>
        </ul>
    </li>
</ul>
			</div>
			<div class="com-layout-content">
				<div class="bread-nav-box">
					<p class="tit">用户信息修改</p>
				</div>
				<div class="ml20 mr20 pt30 bg-fff">
					<div class="user-edit-form">
						<form class="form-horizontal">
							<div class="form-group">
						        <label class="col-sm-1 control-label">用户名</label>
						        <div class="col-sm-5">
						          <input type="text" class="form-control" placeholder="用户名" value="<?php echo $resData['username'] ?>">
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
						          	<select class="form-control">
										<option>管理员</option>
										<option>普通管理员</option>
										<option>用户</option>
						          	</select>
						        </div>
						    </div>
							

							<div class="form-group">
						        <label class="col-sm-1 control-label">手机</label>
						        <div class="col-sm-5">
						          <input type="text" class="form-control" placeholder="手机">
						        </div>
						    </div>


						    <div class="form-group">
						        <label class="col-sm-1 control-label">邮箱</label>
						        <div class="col-sm-5">
						          <input type="text" class="form-control" placeholder="邮箱">
						        </div>
						    </div>


						    <div class="form-group">
						        <label class="col-sm-1 control-label">头像</label>
						        <div class="col-sm-5">
						         	<div class="com-upload-single-box">
										<div class="no-pic" id="J_no-pic"></div>
										<!-- <ul class="uploaded-img-list">
											<li>
												<div class="img-wrap">
													<img src="/static/admin/upload/upalod_1.jpg" />
												</div>
											</li>
										</ul> -->
										<div id="J_uploader-list" class="clearfix">
											<ul class="uploading-img-list">
												<li>
													<div class="img-wrap"><img src="<?php echo STATIC_PATH;?>/public/static/admin/upload/01.jpg"></div>
													<div class="handle-bar">
														<span class="upload-btn">上传</span>
														<span class="del-btn">删除</span>
													</div>
													<div class="progressing">
														<span style="width:18%;"></span>
													</div>
													<div class="error">上传失败了</div>
													<div class="success"></div>
												</li>
											</ul>
										</div>
										<div class="upload-btn-group clearfix">
											<div id="filePicker" class="filepicker-container"></div>
											<a href="#" class="btn btn-success uploader-server-btn">从服务器端选择</a>
										</div>										
									</div>
						        </div>
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