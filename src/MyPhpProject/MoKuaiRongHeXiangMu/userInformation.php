<?php
	session_start();
	include("./common/mysqli.php");
	$userId=$_SESSION["userid"];
	$db->where("id",$userId);
	$result=$db->getOne("user");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户信息页面</title>
    <script type="text/javascript" src="staitc/js/jquery/jquery-1.12.4.js"></script>
    <link rel="stylesheet" type="text/css" href="staitc/js/bootstrap/css/bootstrap.css">


    <script type="text/javascript" src="staitc/js/bootstrapvalidator/js/bootstrapValidator.js"></script>
    <link rel="stylesheet" type="text/css" href="staitc/js/bootstrapvalidator/css/bootstrapValidator.css">
    <link rel="stylesheet" type="text/css" href="staitc/css/style.css">
</head>

<body>
	<div class="container mt20">
    <?php
    	if($_REQUEST['type']=="eidt"){
    ?>
		<form class="form-horizontal userinfo-form-1" method="post" action="userInformation.php?type=edit">
            <div class="form-group">
                <label class="col-sm-2 control-label">头像</label>
                <div class="col-sm-10 userinfo-val">
                    <div class="avatar"><img src="avatar/<?php echo !!$result["avatar"] ? $result["avatar"] :'default_avatar.jpg' ?>"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-10 userinfo-val">
                    <?php echo $result["username"] ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10 userinfo-val">
                    <?php echo $result["password"] ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-10 userinfo-val">
                    <?php echo $result["email"] ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">手机号码</label>
                <div class="col-sm-10 userinfo-val">
                    <?php echo $result["phone"] ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">性别</label>
                <div class="col-sm-10 userinfo-val">
                    <?php echo $result["sex"]==1 ? '男' : ($result["sex"]==2 ? '女' : '保密'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">职业</label>
                <div class="col-sm-10 userinfo-val">
                    <?php 
                    	$occupation=explode(",",$result["occupation"]);
                    	$db->where('id',$occupation,"in");
                    	$result=$db->get('station');
                    	foreach ($result as $key => $value) {
                    		$occupationStrArr[]=$value['title'];
                    	}
                    	echo implode(',',$occupationStrArr);
                    	

                     ?>
                </div>
            </div>
           
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" id="J_submit" class="btn btn-default">编辑</button>
                </div>
                
            </div>
        </form>
    <?php
    	}else{
    ?>
		<form class="form-horizontal userinfo-form-1" method="post" action="doUserInformation.php" id="defaultForm">
            <div class="form-group">
                <label class="col-sm-2 control-label">头像</label>
                <div class="col-sm-10 userinfo-val">
                    <div class="avatar"><img src="avatar/<?php echo !!$result["avatar"] ? $result["avatar"] :'default_avatar.jpg' ?>"></div>
                    <input type="file" name="avatarfile" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-10 userinfo-val">
                   <input type="text" name="username"  class="form-control" placeholder="请输入用户名"  value="<?php echo $result["username"]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10 userinfo-val">
                    <?php echo $result["password"] ?>  <a href="#" class="ml30">修改</a>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-10 userinfo-val">
                     <input type="text" name="email"  class="form-control" placeholder="请输入邮箱"  value="<?php echo $result["email"]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">手机号码</label>
                <div class="col-sm-10 userinfo-val">
                	<input type="text" name="phone"  class="form-control" placeholder="请输入邮箱"  value="<?php echo $result["phone"] ?>">
                   
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">性别</label>
                <div class="col-sm-10 userinfo-val">

                    <label>
                        <input type="radio" name="sex" value="1" <?php echo $result['sex']=='男' ? 'checked' : ''; ?> /> 男</label>
                    <label>
                        <input type="radio" name="sex" value="2" <?php echo $result['sex']=='女' ? 'checked' : ''; ?> />女</label>
                    <label>
                        <input type="radio" name="sex" value="3" <?php echo $result['sex']=='保密' ? 'checked' : ''; ?>>保密</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">职业</label>
                <div class="col-sm-10 userinfo-val">
                    <?php 
                    	$occupation=explode(",",$result["occupation"]);
                    	$result=$db->get('station');
                    	foreach ($result as $key => $value) {
                    ?>
						<label>
                        <input type="checkbox" value="<?php echo $value['id'] ?>" name="occupation[]"  <?php echo in_array($value['id'], $occupation) ? 'checked' :''; ?> /><?php echo $value['title'] ?></label>

                    <?php
                    		
                    	}
                    	
                    	

                     ?>
                </div>
            </div>
           
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" id="J_submit" class="btn btn-default">编辑</button>
                </div>
                
            </div>
        </form>
    <?php
    	}
    ?>
    </div>
   
</body>

</html>