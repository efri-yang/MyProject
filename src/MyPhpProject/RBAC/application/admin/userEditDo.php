<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");
    

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录注册</title>
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/vue/vue.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/css/base.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/js/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/admin.css">
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/admin/js/common.js"></script>
</head>
<body>
	<?php
		$username=$_POST["username"];
	    $role=$_POST["role"];
	    $phone=$_POST["phone"];
	    $email=$_POST["email"];
		$sql="update user inner join user_role on user.id=user_role.uid set username='$username',phone='$phone',email='$email',rid='$role' where user.id='$userId'";

	    $result=$mysqli->query($sql);
	    if($mysqli->affected_rows>=0){
	    	resultDrawGuide(1,"修改信息成功！","userEdit.php?id=$userId");
	    }else{
	    	resultDrawGuide(0,"修改信息失败！","userEdit.php?id=$userId");
	    }
	?>
</body>
</html>