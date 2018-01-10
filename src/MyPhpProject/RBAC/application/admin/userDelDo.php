<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");
    $uid=$_GET["id"]; 
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
		 * 接受 userId,然后通过
		 * 删除user 表中对应的用户
		 * 删除 user_role 中对应的数据
		 * 
		 */
		$deleteFlag=true;
		$sql01="delete from user where id=$uid";
		$sql02="delete from user_role where uid=$uid";


		$mysqli->begin_transaction();

		$res01=$mysqli->query($sql01);
		if(!$mysqli->affected_rows){
			
			$deleteFlag=false;
			$mysqli->rollback();
		}

		$res02=$mysqli->query($sql02);
		if(!$mysqli->affected_rows){
			
			$deleteFlag=false;
			$mysqli->rollback();
		}
		$mysqli->commit();
		$mysqli->close();

		if($deleteFlag){
			resultDrawGuide(1,"删除成功！","userList.php");
		}else{
			resultDrawGuide(0,"删除失败！","userList.php");
		}

	?>
</body>
</html>