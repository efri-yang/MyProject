<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件管理</title>
	<script type="text/javascript" src="../../staitc/js/jquery/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="../../staitc/js/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../../staitc/js/bootstrap/css/bootstrap.css">


    <link rel="stylesheet" type="text/css" href="../../staitc/css/base.css">


    <link rel="stylesheet" type="text/css" href="../../staitc/css/style.css">
   
</head>
<body>
	
				
	<div class="container">
		<form class="form-horizontal" action="doForm.php" method="post" enctype="multipart/form-data">
	      <div class="form-group">
	        <label  class="col-sm-2 control-label">文件</label>
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