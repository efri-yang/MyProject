<?php
	session_start();
	include("./config.inc.php");
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
    	if($_REQUEST['type'] !="edit"){
    ?>
		<form class="form-horizontal userinfo-form-1" method="post" action="userInformation.php?type=edit">
            <div class="form-group">
                <label class="col-sm-2 control-label">头像</label>
                <div class="col-sm-10 userinfo-val">
                    <div class="avatar"><img src="<?php echo !!$result["avatar"] ? $avatarUrl.$result["avatar"] :$avatarUrl.'default_avatar.jpg' ?>"></div>
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
                    <?php echo $result["sex"]; ?>
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
		<form class="form-horizontal userinfo-form-1" enctype="multipart/form-data"  action="doUserInformation.php" id="defaultForm" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label">头像</label>
                <div class="col-sm-10 userinfo-val">
                    <div class="avatar"><img src="<?php echo !!$result["avatar"] ? $avatarUrl.$result["avatar"] :$avatarUrl.'default_avatar.jpg' ?>" id="J_avatar-pic"></div>
                    <input type="file" name="avatarfile" id="J_avatarfile" />
                    <input type="hidden" name="avatarfilepre" value="<?php echo $result["avatar"]; ?>" />
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
                        <input type="radio" name="sex" value="男" <?php echo $result['sex']=='男' ? 'checked' : ''; ?> /> 男</label>
                    <label>
                        <input type="radio" name="sex" value="女" <?php echo $result['sex']=='女' ? 'checked' : ''; ?> />女</label>
                    <label>
                        <input type="radio" name="sex" value="保密" <?php echo $result['sex']=='保密' ? 'checked' : ''; ?>>保密</label>
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
                    <button type="submit" id="J_submit" class="btn btn-default">保存</button>
                </div>
                
            </div>
        </form>
        <script type="text/javascript">
             function getObjectURL(file) {
                var url = null;
                if (window.createObjectURL != undefined) {
                    url = window.createObjectURL(file)
                } else if (window.URL != undefined) {
                    url = window.URL.createObjectURL(file)
                } else if (window.webkitURL != undefined) {
                    url = window.webkitURL.createObjectURL(file)
                }
                return url
            };
            $(function(){
                $("#J_avatarfile").on("change",function(){
                     var url = getObjectURL(this.files[0]); 
                    $("#J_avatar-pic").attr("src",url);
                })
            })
        </script>
    <?php
    	}
    ?>
    </div>
   
</body>

</html>