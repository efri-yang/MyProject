<?php
	session_start();
	include("../../Path.php");
	include("../../common/mysqli.php");
?>
<!DOCTYPE html>
<html>
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
	<div style="height: 25px"></div>
	<div class="container">
		<p><a href="uploadImgForm.php" class="btn btn-success">上传图片</a></p>
	<?php
		$result=$db->get("m_image",null);
		if(!!count($result)){
			foreach ($result as $key => $row) {		
	?>
			<div class="col-sm-4 mt20">
				<p class="align-c img-placeholder"><img src='image.php?recid=<?php echo $row["id"] ?>' width="180" height="180" /></p>
			</div>
	<?php					
			}		
		}
	?>

	</div>
	


	
</body>
</html>