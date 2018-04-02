<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"G:\xampp\htdocs\MyProject\src\MyPhpCms\TPAdmin\public/../application/admin\view\index\index.html";i:1522660501;}*/ ?>
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
    <link rel="stylesheet" type="text/css" href="/MyProject/src/MyPhpCms/TPAdmin/public/static/css/iconfont/iconfont.css">
    <link rel="stylesheet" type="text/css" href="/MyProject/src/MyPhpCms/TPAdmin/public/static/AmazeUI/assets/css/amazeui.css">
    <link rel="stylesheet" type="text/css" href="/MyProject/src/MyPhpCms/TPAdmin/public/static/css/common.css">
    <script type="text/javascript" src="/MyProject/src/MyPhpCms/TPAdmin/public/static/js/common/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="/MyProject/src/MyPhpCms/TPAdmin/public/static/AmazeUI/assets/js/amazeui.js"></script>
    <script type="text/javascript" src="/MyProject/src/MyPhpCms/TPAdmin/public/static/js/plugin/layer/layer.js"></script>
    <script type="text/javascript" src="/MyProject/src/MyPhpCms/TPAdmin/public/static/js/plugin/jquery.ba-throttle-debounce.min.js"></script>
    <script type="text/javascript" src="/MyProject/src/MyPhpCms/TPAdmin/public/static/js/common.js"></script>
</head>

<body>
    <div class="coms-layout-container theme-default">
        <!-- 头部  start****************************************************** -->
        <div class="coms-layout-header">
            <a href="#" class="logo">小鱼生活消费大平台</a>
            <ul class="header-nav">
                <li class="active"><a href="">首页</a></li>
                <li><a href="">社区</a></li>
                <li><a href="">好店</a></li>
                <li><a href="">行业</a></li>
                <li><a href="">白卡</a></li>
            </ul>
            <div class="header-userinfo">
                <a class="info-name" href="javascript:;">onetao<span class="arrow"></span></a>
                <ul class="dropdown-list">
                    <li><a href="#">操作1</a></li>
                    <li><a href="#">操作2</a></li>
                    <li><a href="#">操作3</a></li>
                </ul>
            </div>
            <div class="header-notice">
                <a class="tit" href="javascript:;">通知<b><i>8</i></b></a>
                <ul class="dropdown-list">
                    <li><a href="#">操作1</a></li>
                    <li><a href="#">操作2</a></li>
                    <li><a href="#">操作31</a></li>
                </ul>
            </div>
        </div>
        <!-- 头部  end****************************************************** -->
        <!-- side  start****************************************************** -->
        <div class="coms-layout-aside">
            <div class="aside-unfold"><i class="iconfont f18">&#xe6d4;</i></div>
            <div class="aside-menu-scroll">
                <ul class="aside-menu">
                    <?php echo $webData["sidemenu"]; ?>
                </ul>
            </div>
        </div>
        <!-- side  end****************************************************** -->
        <script type="text/javascript">
        (function($) {
            $(function() {
                var $a = $(".aside-menu").find('.treeview').children('a');
                var $parent;
                var $aside = $(".coms-layout-aside");
                var $body = $("#J_coms-layout-body");
                $.each($a, function(index, el) {
                    $(el).on("click", function() {
                        var $this = $(this);
                        $parent = $this.parent("li");
                        if ($parent.hasClass('hactive')) {
                            $parent.removeClass('hactive');
                        } else {
                            $parent.addClass('hactive');
                        }
                    })
                });
                $(".aside-unfold").on("click", function() {
                    if ($aside.hasClass('fold')) {
                        $aside.removeClass('fold');
                        $body.removeClass('unfold');
                    } else {
                        $aside.addClass('fold');
                        $body.addClass('unfold');
                        $aside.find(".treeview").removeClass('hactive');
                    }
                })
            })
        })(jQuery)
        </script>
        <div class="coms-layout-body p15" id="J_coms-layout-body">
            <div class="coms-elem-quote am-cf">
                <span class="fl f16">通用框架示范</span>
                <ol class="am-breadcrumb fr p0 m0">
                    <li><a href="#">首页</a></li>
                    <li><a href="#">分类</a></li>
                    <li class="am-active">内容</li>
                </ol>
            </div>
        </div>
</body>

</html>