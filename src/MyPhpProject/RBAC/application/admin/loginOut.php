<?php
	session_start();
	include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
	unset($_SESSION['userid']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>退出</title>
	<?php
		include("include/styleScript.php");
	?>
</head>
<body>
	<?php
		if(!isset($_SESSION['userid'])){
			resultDrawGuide(1,"退出成功！","login.php");
		}else{
			resultDrawGuide(0,"退出失败！","userEdit.php?id=".$_SESSION['userid']);
		}

	?>
</body>
</html>



