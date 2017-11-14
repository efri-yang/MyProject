<?php
	session_start();
	include("../config.php");
	include(ROOT_PATH."/include/mysqli.php");
	include(ROOT_PATH."/admin/common/session.php");
	include(ROOT_PATH."/admin/common/common.func.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>首页</title>
	<?php include(ROOT_PATH.'/admin/template/scriptstyle.php') ?>
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH; ?>/admin/static/css/home-index.css">
</head>
<body>
	<?php include(ROOT_PATH.'/admin/template/header_top.php') ?>

	<div class="coms-layout-wrap">
		<?php 
			include("template/layoutAside.php");
		?>
		<div class="coms-layout-main">
			<div class="page-h">
				<div class="caption-1">欢迎使用内容管理系统ddd</div>

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
							<a href="./pagenews/index.php">信息管理</a>
						</li>
						<li>
							<label>栏目操作：</label>
							<a href="./pagecolumns/index.php">管理栏目</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	
	

</body>
</html>