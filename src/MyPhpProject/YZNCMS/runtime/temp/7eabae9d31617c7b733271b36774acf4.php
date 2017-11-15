<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:91:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/content\view\content\singlepage.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/Admin\view\Public\layout.html";i:1510727775;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link href="__STATIC__/admin/css/main.css" rel="stylesheet" type="text/css">
<link href="__STATIC__/admin/font/css/iconfont.css" rel="stylesheet" />
<style type="text/css">html, body { overflow: visible;}</style>
<script type="text/javascript">
var SITEURL = '';
</script>
<script type="text/javascript" src="__STATIC__/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/layer/layer.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/admin.js"></script>
<script type="text/javascript" src="__STATIC__/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/jquery.mousewheel.js"></script>
</head>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>单页管理</h3>
                <h5>单页面新增修改操作</h5>
            </div>
        </div>
    </div>
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="icon iconfont icon-dengpao"></i>
            <h4 alt="提示相关设置操作时应注意的要点" class="itip">操作提示</h4>
            <span id="explanationZoom" alt="收起提示" class="itip"></span>
        </div>
        <ul>
        </ul>
    </div>
    <form action="<?php echo url('add'); ?>" name="adminForm" id="add_form" enctype="application/x-www-form-urlencoded" method="POST" class="form-horizontal auth-form">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label><em>*</em>标题</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="<?php echo $info['title']; ?>" maxlength="40" name="info[title]" class="input-txt">
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>关键词</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="<?php echo $info['keywords']; ?>" maxlength="40" name="info[keywords]" class="input-txt">
                    <p class="notic">多关键词之间用空格隔开</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>关键词</label>
                </dt>
                <dd class="opt" style="width: 80%;">
                    <script type="text/plain" id="content" name="info[content]"><?php echo $info['content']; ?></script>
                    <?php echo \util\Form::editor('content','full','contents',$catid,1); ?>
                </dd>
            </dl>
            <input type="hidden" name="info[catid]" value="<?php echo $catid; ?>" />
            <div class="fix-bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="document.adminForm.submit()">确认提交</a></div>
        </div>
    </form>
</div>

</body>
</html>