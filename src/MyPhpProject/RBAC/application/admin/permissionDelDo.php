<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");
    $urlFileName=getUrlFileName();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php  @include("./include/styleScript.php");?>
</head>
<body>
	<?php
		$id=$_GET["id"];
		$sql="delete from perssion where perssion.id=$id";
		$res=$mysqli->query($sql);
		$sql="delete from perssion_role where perssion_role.pid=$id";
		$res=$mysqli->query($sql);
		if($mysqli->affected_rows){
			resultDrawGuide(1,"删除成功!","permissionList.php");
		}else{
			resultDrawGuide(1,"删除失败!","permissionList.php");	
		}
	?>
</body>
</html>