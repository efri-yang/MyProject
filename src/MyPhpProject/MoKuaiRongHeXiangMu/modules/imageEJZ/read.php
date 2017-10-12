<?php
	include("../../config.inc.php");
    include($dirName."/common/mysqli.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>文件管理</title>
	<script type="text/javascript" src="../../staitc/js/jquery/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="../../staitc/js/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../../staitc/js/bootstrap/css/bootstrap.css">


    <link rel="stylesheet" type="text/css" href="../../staitc/css/base.css">


    <link rel="stylesheet" type="text/css" href="../../staitc/css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<?php 
		include("../../template/header_top.php");
	?>
	<div style="height: 25px"></div>
	<div class="container">
	<?php
		$result=$db->get("m_image",null);
		if(!!count($result)){
			foreach ($result as $key => $row) {		
	?>
			<div class="col-sm-4">
				<img src='image.php?recid=<?php echo $row["id"] ?>' width="24" height="24" />
			</div>
	<?php					
			}		
		}
	?>

	</div>
	<div class="container"><p><a href="form.php" class="btn btn-success">上传图片</a></p></div>


	
</body>
</html>