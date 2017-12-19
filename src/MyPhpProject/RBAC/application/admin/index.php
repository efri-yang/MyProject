<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");

    $sql="select * from user where id='$userId'";

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理后台首页</title>
    <script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/vue/vue.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/jquery/jquery-1.12.4.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/css/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/js/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/common.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/admin.css">

    <script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/admin/js/common.js"></script>
</head>
<body>
   
	  <div class="com-layout-header">
		<p class="header-top-tit">管理后台</p>
		<div class="header-top-avatar">
			<div class="avatar-info">
				<a href="#" class="clearfix">
					<div class="pic"><img src="<?php echo STATIC_PATH;?>/public/static/admin/upload/01.jpg"></div>
					<p class="txt">杨艺辉</p>
				</a>
			</div>
			<div class="avatar-handle">
				<a href="userEdit.php?id=1">信息修改</a>
				<a href="loginout.php">退出</a>
			</div>
		</div>
	  </div>
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
					<p class="tit">文章列表</p>
				</div>
			</div>
	  </div>
</body>
</html>