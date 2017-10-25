<?php
	session_start();
	include("../Path.php");
	include("../common/mysqli.php");
	include("./common/session.php");
	include("./common/common.func.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>首页</title>
	<?php include('../template/scriptstyle.php') ?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include('temp/header_top.php') ?>
	
	<!-- 
		没有栏目的话 显示没有栏目，提示去创建栏目
	 -->
	 <div class="container page-h">
			<div class="caption-1">欢迎使用内容管理系统</div>

			<div class="module-item">
				<div class="hd">我的状态</div>
				<div class="admin-infor">
					<p>登录者: <span>yyh1</span></p>
					<p>这是您第 7 次登录，上次登录时间： 2017-10-20 16:49:57 ，登录IP： ::1:59360</p>
				</div>
			</div>


			<div class="module-item">
				<div class="hd">快捷菜单</div>
				<ul class="list-1">
					<li>
						<label>信息操作：</label>
						<a href="./pagenews/index.php">添加信息</a>
					</li>
					<li>
						<label>栏目操作：</label>
						<a href="./pagecolumns/index.php">管理栏目</a>
					</li>
				</ul>
			</div>
	 </div>

	

</body>
</html>