<?php
	include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");
    $urlFileName=getUrlFileName();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<?php  @include("./include/styleScript.php");?>
</head>
<body>
	<?php
		/**
		 * 通过角色的id
		 * 
		 * 删除 role表
		 * 删除 perssion_role 中 rid 对应的权限数据
		 */
		$rid=$_GET["id"];
		$sql01="delete from role where id=$rid";
		$sql02="delete from perssion_role where rid=$rid";
		$mysqli->begin_transaction();

		


	?>
</body>
</html>