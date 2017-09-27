<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>注册页面</title>
    <script type="text/javascript" src="staitc/js/jquery/jquery-1.12.4.js"></script>
    <link rel="stylesheet" type="text/css" href="staitc/js/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="staitc/css/style.css">

    <script type="text/javascript" src="staitc/js/bootstrapvalidator/js/bootstrapValidator.js"></script>
    <link rel="stylesheet" type="text/css" href="staitc/js/bootstrapvalidator/css/bootstrapValidator.css">

</head>

<body>
    <div class="container mt20">
        <form class="form-horizontal" method="post" action="./doRegister.php" id="defaultForm">
            <div class="form-group">
                <label class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-10">
                    <input type="text" name="username"  class="form-control" placeholder="请输入用户名" value="yyh1">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                    <input type="password" name="pwd"  class="form-control" placeholder="请输入密码" value="111111">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">密码确认</label>
                <div class="col-sm-10">
                    <input type="password" name="confirmPwd"  class="form-control" placeholder="请输入密码" value="111111">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-10">
                    <input type="text" name="email"  class="form-control" placeholder="请输入邮箱" value="948061564@qq.com">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">手机号码</label>
                <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" placeholder="请输入手机号码" value="18559160494">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">性别</label>
                <div class="col-sm-10">
                    <label>
                        <input type="radio" name="sex" value="1"> 男</label>
                    <label>
                        <input type="radio" name="sex" value="2">女</label>
                    <label>
                        <input type="radio" checked value="3" name="sex">保密</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">职业</label>
                <div class="col-sm-10">
                    <label>
                        <input type="checkbox" checked value="1" name="occupation[]" />Java工程师</label>
                    <label>
                        <input type="checkbox" value="2" name="occupation[]" />C工程师</label>
                    <label>
                        <input type="checkbox" value="3" name="occupation[]" />C++工程师</label>
                    <label>
                        <input type="checkbox" value="4" name="occupation[]" />C#工程师</label>
                    <label>
                        <input type="checkbox" value="5" name="occupation[]" />Python工程师</label>
                    <label>
                        <input type="checkbox" value="6" name="occupation[]" />Visual Basic工程师</label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" id="J_submit" class="btn btn-default">登陆</button>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#defaultForm')
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
                            },
                            stringLength: {
                                min: 3,
                                max: 16,
                                message: '用户名需要3-16位之间字母或者数字组合'
                            },
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
                            },
                            identical: {
                                field: 'confirmPassword',
                                message: '两次密码输入不一样！'
                            }
                        }
                    },
                    confirmPwd: {
                        validators: {
                            notEmpty: {
                                message: '请输入确认密码啊！'
                            },
                            identical: {
                                field: 'pwd',
                                message: '两次密码输入不一样！'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: '请输入邮箱！'
                            },
                            regexp: {
                                regexp: /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((.[a-zA-Z0-9_-]{2,3}){1,2})$/,
                                message: '您输入的邮箱格式不正确！'
                            }
                        }
                    },
                    phone: {
                        validators: {
                            notEmpty: {
                                message: '请输入手机号码！'
                            },
                            regexp: {
                                regexp: /^0?1[3|4|5|6|7|8][0-9]\d{8}$/,
                                message: '您输入的手机格式不正确！'
                            }
                        }
                    },
                    sex: {
                        validators: {
                            notEmpty: {
                                message: '请选择性别！'
                            }
                        }
                    },
                    'occupation[]': {
                        validators: {
                            notEmpty: {
                                message: '请选择职业！'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function(e) {

                alert("xxx")
            });
    });
    </script>
</body>

</html>