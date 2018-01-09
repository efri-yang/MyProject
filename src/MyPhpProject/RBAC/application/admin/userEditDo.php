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
	<title>管理后台——用户信息编辑</title>
	<?php  @include("./include/styleScript.php");?>
</head>
<body>
	<?php
		$username=$_POST["username"];
	    $role=$_POST["role"];
	    $phone=$_POST["phone"];
	    $email=$_POST["email"];
		$sql="update user inner join user_role on user.id=user_role.uid set username='$username',phone='$phone',email='$email',rid='$role' where user.id='$uid'";

	    $result=$mysqli->query($sql);
	    if($mysqli->affected_rows>=0){
	    	resultDrawGuide(1,"修改信息成功！","userInfo.php?id=$uid");
	    }else{
	    	resultDrawGuide(0,"修改信息失败！","userInfo.php?id=$uid");
	    }
	?>
</body>
</html>