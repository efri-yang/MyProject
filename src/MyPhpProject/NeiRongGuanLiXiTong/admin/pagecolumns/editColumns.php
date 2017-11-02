<?php
	session_start();

	
	include("../../config.php");
	include(ROOT_PATH."/include/mysqli.php");
	include(ROOT_PATH."/admin/common/session.php");
	include(ROOT_PATH."/admin/common/common.func.php");
	include(ROOT_PATH."/admin/common/classtree.func.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>栏目编辑</title>
	<?php include(ROOT_PATH.'/admin/template/scriptstyle.php') ?>
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH; ?>/admin/static/css/page-column.css">
</head>
<body>
	<?php include(ROOT_PATH.'/admin/template/header_top.php') ?>
	<div class="container">
		<table class="col-edit-tbl">
			<thead>
				<tr>
					<th width="15%"></th>
					<th width="85%"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="para-tit">栏目名称：</td>
					<td><input type="text" name="classname"></td>
				</tr>
				<tr>
					<td class="para-tit">所属父栏目：</td>
					<td><input type="text" name="classname"></td>
				</tr>
				<tr>
					<td class="para-tit">是否是终极栏目：</td>
					<td><input type="text" name="classname"></td>
				</tr>
				<tr>
					<td class="para-tit">栏目存放文件夹：</td>
					<td><input type="text" name="classname"></td>
				</tr>

				<tr>
					<td  class="para-tit">栏目缩略图：</td>
					<td><input type="text" name="classname"></td>
				</tr>

				
				<tr>
					<td  class="para-tit">页面关键字：</td>
					<td><input type="text" name="classname"></td>
				</tr>
				<tr>
					<td  class="para-tit">栏目简介：</td>
					<td><input type="text" name="classname"></td>
				</tr>
			</tbody>
	</div>
</body>
</html>