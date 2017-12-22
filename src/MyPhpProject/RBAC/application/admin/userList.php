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
	<title>管理后台——用户信息列表</title>
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/jquery/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/vue/vue.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/css/base.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/js/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/admin.css">

	<link  type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/js/webuploader/webuploader.css">
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/webuploader/webuploader.js"></script>

	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/admin/js/webuploader.js"></script>

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
				<div class="bread-nav-box clearfix">
					<p class="tit fl">用户列表</p>
					<a href="user-add.html" class="btn btn-success fr mt15">添加用户</a>
				</div>
				<div class="pl20 pr20 pt20">
					<div class="bg-fff">
						<table class="user-list-tbl">
							<thead>
								<tr>
									<th>名称</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sql="select * from user where id !='$userId'";
									$res=$mysqli->query($sql);
									while ($row=$res->fetch_assoc()) {
										$resData[]=$row;
									}
									foreach ($resData as $key => $value) {
								?>
								<?php		
									}
								?>
								<tr>
									<td>admin</td>
									<td>
										<a href="user-edit.html" class="btn btn-info mr10">修改</a>
										<a href="#" class="btn btn-danger">删除</a>
									</td>
								</tr>
								<tr>
									<td>ptadmin</td>
									<td>
										<a href="user-edit.html" class="btn btn-info mr10">修改</a>
										<a href="#" class="btn btn-danger">删除</a>
									</td>
								</tr>
								<tr>
									<td>user</td>
									<td>
										<a href="user-edit.html" class="btn btn-info mr10">修改</a>
										<a href="#" class="btn btn-danger">删除</a>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="com-pagination-box">
							<a href="#" class="first disabled">首页</a>
							<a href="#" class="prev disabled">上一页</a>
							<span>...</span>
							<a href="#">3</a>
							<a href="#">4</a>
							<a href="#" class="current">5</a>
							<a href="#">6</a>
							<a href="#">7</a>
							<span>...</span>
							<a href="#" class="next disabled">下一页</a>
							<a href="#" class="last disabled">尾页</a>
							<span>共11</span>
							<form class="pageform" action="m_page.sql" method="post">
								<span>到 <input type="text" size="2">页</span>
								<input type="submit" value="确定" />
							</form>
						</div>
					</div>
				</div>
			</div>

	  </div>
</body>
</html>