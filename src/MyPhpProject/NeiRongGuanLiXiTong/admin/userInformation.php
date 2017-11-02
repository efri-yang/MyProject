<?php
    session_start();
  

    include("../config.php");
    include(ROOT_PATH."/include/mysqli.php");
    include(ROOT_PATH."/admin/common/session.php");
    include(ROOT_PATH."/admin/common/common.func.php");
    
    $userId=$_SESSION["userid"];
    $sql="select * from admin where id='".$userId."'";
    $result1=$mysqli->query($sql);
    $result=resultToArray($result1)[0];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户信息页面</title>
        
    <?php include(ROOT_PATH.'/admin/template/scriptstyle.php'); ?>

    <script type="text/javascript" src="<?php echo STATIC_PATH; ?>/admin/static/js/bootstrapvalidator/js/bootstrapValidator.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH; ?>/admin/static/js/bootstrapvalidator/css/bootstrapValidator.css">

    
    
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
                    <div class="avatar"><img src="<?php echo !!$result["avatar"] ? STATIC_PATH."/uploads/avatar/".$result["avatar"] :STATIC_PATH."/admin/static/images/pagecolumn/".'default_avatar.jpg' ?>"></div>
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
                      
                        $sql="select * from station where id in(".$result["occupation"].")";
                    
                    	$resResource=$mysqli->query($sql);
                        $result=resultToArray($resResource);
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
                    <div class="avatar"><img  id="J_avatar-pic" src="<?php echo !!$result["avatar"] ? STATIC_PATH."/uploads/avatar/".$result["avatar"] :STATIC_PATH."/admin/static/images/pagecolumn/".'default_avatar.jpg' ?>"></div>
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
                    	$result=resultToArray($mysqli->query("select * from station"));
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