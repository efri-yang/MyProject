<?php
	include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");


    $username=trim($_POST["username"]);
    $password=trim($_POST["password"]);
    $captchaCode=$_POST["yzm"];
    $captchaServer=$_SESSION["captcha"];

    $errorStr;
    if(empty($username)){
    	$errorStr="请输入用户名！";
    }elseif(empty($password)){
    	$errorStr="请输入密码！";
    }elseif(empty($captchaCode)){
    	$errorStr="请输入验证码！";
    }elseif($captchaCode !=$captchaServer){
    	$errorStr="验证码错误！";
    }
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
			if(empty($errorStr)){
		    	$sql="select * from user where username='".$username."' and password='".md5($password)."'";
		    	$result=$mysqli->query($sql);
		    	if(!$result->num_rows){
		    		$errorStr="您输入的用户名或者密码错误！";
		    		resultDrawGuide(0,$errorStr,"login.php");
		    	}else{
		    		$errorStr="登录成功";
		    		$resultArr=$result->fetch_assoc();
		    		$_SESSION['userid']=$resultArr["id"];
		    		resultDrawGuide(1,$errorStr,"index.php");
		    	}
		    }else{
		    	resultDrawGuide(0,$errorStr,"login.php");
		    }

		?>
</body>
</html>

