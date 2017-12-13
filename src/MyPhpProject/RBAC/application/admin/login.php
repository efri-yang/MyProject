<?php
	include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录注册</title>
	
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/css/base.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/js/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/admin.css">
</head>
<body>
		<div class="container mt20 login-form-box">
        <div class="login-server-tip"></div>
        <form class="form-horizontal" method="post" action="./doLogin.php" id="defaultForm">
            <div class="form-group">
                <label  class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" placeholder="用户名">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control"  placeholder="密码">
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">验证码</label>
                <div class="col-sm-2">
                    <input type="text" name="yzm" class="form-control"  placeholder="密码" id="J_yzm">
                </div>

                <div class="col-sm-8">
                    <span class="yzm-pic"><img  src="/public/static/admin/upload/01.jpg" id="J_captcha-img"></span>
                    <a href="" class="yzm-btn" id="J_yzmbtn">看不清</a>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" class="btn btn-default mr20">登录</button>  
                </div>
                <!-- <div class="col-sm-4">
                    <span>还没有账号？<a href="register.php">立即注册</a></span>
                </div> -->
            </div>
        </form>
    </div>

</body>
</html>