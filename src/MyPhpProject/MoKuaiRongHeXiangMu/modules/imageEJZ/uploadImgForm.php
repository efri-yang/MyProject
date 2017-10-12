<?php
	session_start();
	include("../../Path.php");
	include("../../common/mysqli.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件管理</title>
	<?php include("../../template/scriptstyle.php"); ?>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<?php 
		include("../../template/header_top.php");
		include("../../template/nav.php");
	?>
				
	<div class="container">
		<h5 class="bread-crumbs">图片二进制存储->上传图片</h5>
		<form class="form-horizontal" action="doUploadImgForm.php" method="post" enctype="multipart/form-data">
	      <div class="form-group">
	        <label class="col-sm-2 control-label">文件</label>
	        <div class="col-sm-10">
	          	<input type="file" class="form-control" name="image">
	        </div>
	      </div>
	      <div class="form-group">
	        <label  class="col-sm-2 control-label"></label>
	        <div class="col-sm-10">
	          	<input type="submit" value="提交" />
	        </div>
	      </div>
    	</form>
	</div>
	
		
	
</body>
</html>