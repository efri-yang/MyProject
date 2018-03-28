<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:97:"E:\Xampp\htdocs\MyProject\src\MyPhpCms\TPVoting\public/../application/admin\view\login\index.html";i:1520322360;}*/ ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="/MyProject/src/MyPhpCms/TPVoting/public/static/admin/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="/MyProject/src/MyPhpCms/TPVoting/public/static/admin/css/base.css">
    <script type="text/javascript" src="/MyProject/src/MyPhpCms/TPVoting/public/static/admin/layui/layui.js"></script>
    <link rel="stylesheet" type="text/css" href="/MyProject/src/MyPhpCms/TPVoting/public/static/admin/css/registerLogin.css">
</head>

<body>
    <div class="layui-container page-login">
        <div class="layui-col-md3"></div>
        <div class="layui-col-md6">
            <form class="layui-form" action="<?php echo url('admin/login/login'); ?>" method="post">
                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱</label>
                    <div class="layui-input-block">
                        <input type="text" name="email" required lay-verify="required|email" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="password" required lay-verify="required|pass" placeholder="请输入密码" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">验证码</label>
                    <div class="layui-input-inline" style="width:110px;">
                        <input type="text" name="captcha" required lay-verify="required" placeholder="请输入验证码" autocomplete="off" class="layui-input" />
                    </div>
                    <div class="yzm-pic">
                        <img src="<?php echo captcha_src(); ?>" alt="captcha" id="J_captcha" />
                    </div>
                    <p class="yzm-kbq" id="J_captcha-kbq">看不清</p>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"></label>
                    <div class="layui-input-block">
                        <input type="checkbox" value="1" name="remember" lay-skin="primary" title="记住我">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="layui-col-md3"></div>
    </div>
    <script type="text/javascript">
    layui.use(["jquery", "form"], function($, form) {



        form.verify({
            email: [/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/, "请输入正确邮箱地址"],
            pass: [/(.+){6,12}$/, '密码必须6到12位']
        });

        $(function() {

            function refreshVerify() {
                var ts = Date.parse(new Date()) / 1000;
                $('#J_captcha').attr("src", "<?php echo captcha_src(); ?>");
            }
            $("#J_captcha-kbq").on("click", function() {
                refreshVerify();
            })
        })
    });
    </script>
</body>

</html>