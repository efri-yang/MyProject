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
	
</head>
<body>
	<?php
		handleResult(0,"asdfasdfsdfsd","index.php",20);
	?>
</body>
</html>