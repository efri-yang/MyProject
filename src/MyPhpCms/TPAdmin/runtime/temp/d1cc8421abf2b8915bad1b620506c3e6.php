<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"G:\xampp\htdocs\MyProject\src\MyPhpCms\TPAdmin\public/../application/admin\view\login\index.html";i:1522239492;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/iconfont/iconfont.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/AmazeUI/assets/css/amazeui.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/common.css">
    <script type="text/javascript" src="__STATIC__/js/common/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="__STATIC__/AmazeUI/assets/js/amazeui.js"></script>
    <script type="text/javascript" src="__STATIC__/js/plugin/layer/layer.js"></script>
    <script type="text/javascript" src="__STATIC__/js/plugin/jquery.ba-throttle-debounce.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/common.js"></script>
</head>

<body>
    <div class="am-g mt50">
        <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
            <form method="post" id="J_form-1" class="am-form am-form-horizontal" action="<?php echo url('admin/login/login'); ?>">
                <div class="am-form-group">
                    <label class="am-para-label">邮箱：</label>
                    <div class="am-para-input">
                        <input type="text"   placeholder="输入邮箱" name="email" required />
                    </div>
                </div>
                <div class="am-form-group">
                    <label class="am-para-label">密码：</label>
                    <div class="am-para-input">
                        <input type="password" placeholder="输入密码" name="password"  required />
                    </div>
                </div>
                <div class="am-form-group">
                    <label class="am-para-label">验证码：</label>
                    <div class="am-para-inline">
                        <input type="text" placeholder="输入密码" name="captcha" />
                    </div>
                    <div class="am-para-inline">
                        <img src="<?php echo captcha_src(); ?>" style="height:37px;" id="J_captcha">
                    </div>
                    <div class="am-para-inline"><p class="yzm-kbq" id="J_captcha-kbq" style="height:37px;line-height:37px;">看不清</p></div>
                </div>
                <div class="am-cf pl50 pr50">
                    <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
                    <a href=""  value="" class="am-btn am-btn-default am-btn-sm am-fr ml30">立即注册</a>
                    <a href=""  value="" class="am-btn am-btn-default am-btn-sm am-fr">忘记密码 ^_^?</a>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
    (function($) {
        $(function() {
            function refreshVerify() {
                var ts = Date.parse(new Date()) / 1000;
                $('#J_captcha').attr("src", "<?php echo captcha_src(); ?>");
            }

            $("#J_captcha-kbq").on("click", function() {
                refreshVerify();
            })
        })
    })(jQuery);

    $(function(){
    	$("#J_form-1").validator({
    		validate: function(validity) {
    			 var v = $(validity.field).val();
    			
    		},
    		submit: function() {
    			
    			
    		}
    	})
    })
    </script>
</body>

</html>