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

		/**
		 * 这里出现要记住：我们添加了一个用户：那么要处理三件事情
		 * 
		 * 向user 表中添加用户记录 用户记录
		 * 向 user_role 中添加 用户 角色 数据
		 * 
		 * 向 permission_role 中添加 用户
		 */
		
		$insertFlag=true;
		if(!!$errorTxt){	
			resultDrawGuide(0,$errorTxt,"userAdd.php");
		}else{
			$password=md5($password);
			$mysqli->begin_transaction();
			$sql01="insert into user(username,password,email,phone) values('$username','$password','$email','$phone')";
			$sql02="insert into user_role(uid,rid) values((select max(id) from user),'$role')";
			$result01=$mysqli->query($sql01);

			if(!$result01){
				$insertFlag=false;
				$mysqli->rollback();
			}
			$result02=$mysqli->query($sql02);

			if(!$result02){
				$insertFlag=false;
				$mysqli->rollback();
			}

			$mysqli->commit();
			$mysqli->close();

			if($insertFlag){
				resultDrawGuide(1,"添加成功！","userList.php");
			}else{
				resultDrawGuide(0,"添加失败！","userList.php");
			}
		}
	?>
</body>
</html>