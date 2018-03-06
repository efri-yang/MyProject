<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:103:"E:\Xampp\htdocs\MyProject\src\MyPhpCms\TPVoting\public/../application/admin\view\register\register.html";i:1518312774;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/base.css">
    <script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/registerLogin.css">
</head>

<body>
   
    <div class="layui-container page-login">
        <div class="layui-col-md3"></div>
        <div class="layui-col-md6">
            <form class="layui-form" action="register/register" method="post">
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-block">
                        <input type="text" name="username"  lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱</label>
                    <div class="layui-input-block">
                        <input type="text" name="email"  lay-verify="required|email" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="password"  lay-verify="required|passsword" placeholder="请输入密码" autocomplete="off" class="layui-input">
                    </div>
                </div>
                
               
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">立即注册</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="layui-col-md3"></div>
    </div>
    
    <script type="text/javascript">
    // layui.use(["form"], function() {
    //     var form = layui.form;
    //     form.verify({
    //         email:[/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/,"请输入正确邮箱地址"],
    //         passsword: [/(.+){6,12}$/, '密码必须6到12位']
    //     })
    // });
    </script>
</body>

</html>