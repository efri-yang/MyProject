<?php
    include("../config.php");
    include(ROOT_PATH."/admin/common/common.func.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>登录页面</title>
    <?php 
        include(ROOT_PATH."/admin/template/scriptstyle.php")
    ?>

    <script type="text/javascript" src="<?php echo STATIC_PATH; ?>/admin/static/js/bootstrapvalidator/js/bootstrapValidator.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH; ?>/admin/static/js/bootstrapvalidator/css/bootstrapValidator.css">
   
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
                    <span class="yzm-pic"><img  src="doCaptcha.php?r=<?php echo rand();?>" id="J_captcha-img"></span>
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
    <script type="text/javascript">
        $(function(){
            $("#J_yzmbtn").on("click",function(event){
                event.preventDefault();
                $("#J_captcha-img").attr("src","doCaptcha.php?r="+Math.random());
                $("#J_yzm").val("");
            });

            var validateAjaxSuccess;
            $('#defaultForm').bootstrapValidator({
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
                            }
                        }
                    },
                    yzm: {
                        validators: {
                            notEmpty: {
                                message: '请输入验证码！'
                            },
                            threshold:4,
                            remote: {
                                url:"doCaptcha.php?type=ajax",
                                message: '请输入正确的验证码',//提示消息
                                delay:1500,
                                type: 'POST'//请求方式
                            }
                        }
                    },
                }
            }).on('success.form.bv', function(e) {
               
                if(!validateAjaxSuccess){
                    e.preventDefault();
                    $.ajax({
                        url:"doLogin.php?type=ajax",
                        type:"post",
                        data:$('#defaultForm').serialize(),
                        success:function(data){
                           if(!!data && data !=0){
                                $(".login-server-tip").html(data).slideDown();
                           }else{
                                 validateAjaxSuccess=true;
                                $('#defaultForm').submit();
                           }
                        }
                    })
                }
                
            });



        })
    </script>
</body>

</html>