<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");

    $username=$_POST["username"];
    $password=$_POST["password"];

    $role=$_POST["role"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];

    //服务端进行验证判断到时候记得补上
    if(empty($username)){
    	$errorTxt="请输入用户名！";
    }elseif(empty($password)){
    	$errorTxt="请输入密码！";
    }elseif(empty($role)){
    	$errorTxt="请选择角色！";
    }elseif(empty($phone)){
    	$errorTxt="请输入手机号码！";
    }elseif(empty($email)){
    	$errorTxt="请输入邮箱！";
    }
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

		$sql="insert into user_role(uid,rid) values((select max(id) from user)+1,'$role')";
		$result=$mysqli->query($sql);
		if($result){
			echo "xsdfasdfasd陈宫";
		}else{
			echo "失败！！！！";
		}
		// if(!!$errorTxt){	
		// 	resultDrawGuide(0,$errorTxt,"userAdd.php");
		// }else{
		// 	$password=md5($password);
		// 	$sql="insert into user(username,password,email,phone) values('$username','$password','$email','$phone')";
		// 	$sql="insert into user_role(uid,rid) values((select max(id) from user)+1)";
		// 	$mysqli->query("start transaction");

		// 	$result=$mysqli->query($sql);

		// 	if($result->num_rows){
		// 		echo "插入成功----------------";
		// 	}else{
		// 		echo "插入失败----------------";
		// 	}
		// }
	?>
</body>
</html>