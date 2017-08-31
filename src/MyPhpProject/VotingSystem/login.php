<?php
    session_start();
    include("./libs/mysql.func.php");
    $emptyFlag=false;
    $validFlag=true;
    if(isset($_POST["username"]) && isset($_POST["pwd"])){
        $username=$_POST["username"];
        $password=$_POST["pwd"];
        if(empty($username) || empty($password)){
            $emptyFlag=true;
        }else{
            $pwdMd5=md5($password);

            $sql="select * from user where username='$username' and password='$pwdMd5'";
            $result=$mysqli->query($sql);
            if($result->num_rows){
                $row=$result->fetch_array();
                $_SESSION["id"]=$row["id"];
                header('Location:index.php');
               
            }else{
                $validFlag=false;
            }
        }
    }else{
        $username="";
        $password="";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登陆页面</title>
    <link rel="stylesheet" type="text/css" href="./styles/base.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap-theme.css">
    <script type="text/javascript" src="./bootstrap/js/bootstrap.js"></script>

    <script type="text/javascript" src="./bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="./bootstrap/bootstrapvalidator/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="./bootstrap/bootstrapvalidator/js/language/zh_CN.js"></script>


    <link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>

<body>
<style type="text/css">
    .error-loginbox{
        
        padding: 10px 0;
        height: 50px;
        line-height: 50px;
        margin-bottom: 30px;
    }
    .error-loginbox .txt{
        border:1px solid #f60;
        font-size: 16px;
        color: :#fff;
    }
</style>
<div class="container">
    <div class="row">
        <?php
            if($emptyFlag){
        ?>
                <div class="error-loginbox">用户名或者密码不能为空</div>
        <?php
            }
           
        ?>
                 <div class="error-loginbox" id="J_error-loginbox">
                    
                    <?php 
                        if(!$validFlag){
                            echo '<div class="txt">您输入的用户名或者密码错误！</div>';
                        }
                     ?>
                     </div>
                 </div>
        
        <form class="form-horizontal" action="./login.php" method="post" id="logoForm">
            <div class="form-group">
                <label  class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control"  placeholder="请输入用户名 / 邮箱" value="<?php echo $username;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                    <input type="password" name="pwd" value="<?php echo $password;?>" class="form-control"  placeholder="请输入密码">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">登陆</button>
                </div>
            </div>
        </form>
    </div>
</div>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#logoForm')
            .bootstrapValidator({
                message: '您输入的值不符合规则',
                //live: 'submitted',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    username: {
                        validators: {
                            notEmpty: {
                                message: '请输入用户名！'
                            }
                        }
                    },
                    pwd: {
                        validators: {
                            notEmpty: {
                                message: '请输入密码啊！'
                            },
                            stringLength: {
                                min: 6,
                                max: 16,
                                message: '密码需要6-16位之间字母或者数字组合'
                            }
                        }
                    }
                }
            });

             $('#logoForm').find("input[name='username'],input[name='pwd']").on("focus",function(){
                    $("#J_error-loginbox").children().fadeOut();
             })


});
</script>
</body>
</html>
