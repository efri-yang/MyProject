<?php
	session_start();
	include("../../Path.php");
	include("../../common/mysqli.php");
	include("../common/session.php");
	include("../common/common.func.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include('../../template/scriptstyle.php') ?>
	
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<?php include('../temp/header_top.php') ?>

	<div class="container columns-h">
		<table class="columns-h-tbl">
			<thead>
				<tr>
					<th></th>
					<th>ID</th>
					<th>栏目名</th>
					<th>栏目管理</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td class="align-l"><img src="images/dir.gif"></td>
					<td>1</td>
					<td>前端专区</td>
					<td class="handle">
						<a href="#">编辑</a>
						<a href="#">删除</a>
					</td>
				</tr>
				<tr>
					<td class="align-l">&nbsp;&nbsp;<img src="images/txt.gif"></td>
					<td>4</td>
					<td>css设计</td>
					<td class="handle">
						<a href="#">编辑</a>
						<a href="#">删除</a>
					</td>
				</tr>
				<tr>
					<td class="align-l">&nbsp;&nbsp;<img src="images/txt.gif"></td>
					<td>5</td>
					<td>js设计</td>
					<td class="handle">
						<a href="#">编辑</a>
						<a href="#">删除</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>