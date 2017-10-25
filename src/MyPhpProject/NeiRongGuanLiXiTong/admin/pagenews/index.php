<?php
	session_start();
	include("../../Path.php");
	include("../../common/mysqli.php");
	include("../../common/session.php");
	include("../common/common.func.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加信息</title>
	<?php include('../../template/scriptstyle.php') ?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<table class="news-add-tbl">
			<tr>
				<td class="para-tit"><span class="star">*</span>标题：</td>
				<td><input type="text" size="45" name=""></td>
			</tr>
			<tr>
				<td class="para-tit">副标题：</td>
				<td><input type="text" size="45" name=""></td>
			</tr>
			<tr>
				<td class="para-tit">副标题：</td>
				<td><input type="text" size="45" name=""></td>
			</tr>
			
			<tr>
				<td class="para-tit">关键字：</td>
				<td>
					<textarea rows="2" cols="60"></textarea>
				</td>
			</tr>
			<tr>
				<td class="para-tit">描述：</td>
				<td>
					<textarea rows="3" cols="60"></textarea>
				</td>
			</tr>
			<tr>
				<td class="para-tit">缩略图：</td>
				<td>
					<input type="file" />
				</td>
			</tr>
			<tr>
				<td class="para-tit">内容：</td>
				<td>
					
				</td>
			</tr>
		</table>

	</div>
</body>
</html>