<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\cache\index.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\Public\layout.html";i:1510727775;s:81:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\public\nav.html";i:1510727775;}*/ ?>
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
                <h3>清理缓存</h3>
                <h5>清理网站缓存使设置类操作生效</h5>
            </div>
            <ul class="tab-base nc-row">
                <?php $getMenu = isset($Custom)?$Custom:model('common/Menu')->getMenu(); if(is_array($getMenu) || $getMenu instanceof \think\Collection || $getMenu instanceof \think\Paginator): $i = 0; $__LIST__ = $getMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$group_menu): $mod = ($i % 2 );++$i;?>
    <li><a <?php if($group_menu['action'] == \think\Request::instance()->action()): ?> class="current" <?php endif; ?> href="<?php echo url($group_menu['url'],$group_menu['parameter']); ?>" ><span><?php echo $group_menu['title']; ?></span></a></li>
<?php endforeach; endif; else: echo "" ;endif; ?>












            </ul>
        </div>
    </div>
    <!-- 操作说明 -->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="icon iconfont icon-dengpao"></i>
            <h4 alt="提示相关设置操作时应注意的要点" class="itip">操作提示</h4>
            <span id="explanationZoom" alt="收起提示" class="itip"></span>
        </div>
        <ul>
            <li>当系统修改设置后，前后台部分内容需及时更新缓存方可显示正常。</li>
        </ul>
    </div>
    <form method="POST" class="form-horizontal">
        <div class="ncap-form-all">
            <dl class="row">
                <dt class="tit"><span>选择要更新的缓存数据</span></dt>
                <dd class="opt nobg nopd nobd nobs">
                    <div class="ncap-account-container">
                        <h4>更新站点数据缓存</h4>
                        <ul class="ncap-account-container-list">
                            <a href="<?php echo url('cache/index',array('type'=>'site')); ?>" class="ncap-btn-mini ncap-btn-green">提交</a>
                        </ul>
                    </div>
                    <div class="ncap-account-container">
                        <h4>更新站点模板缓存</h4>
                        <ul class="ncap-account-container-list">
                            <a href="<?php echo url('cache/index',array('type'=>'template')); ?>" class="ncap-btn-mini ncap-btn-green">提交</a>
                        </ul>
                    </div>
                    <div class="ncap-account-container">
                        <h4>清除网站运行日志</h4>
                        <ul class="ncap-account-container-list">
                            <a href="<?php echo url('cache/index',array('type'=>'logs')); ?>" class="ncap-btn-mini ncap-btn-green">提交</a>
                        </ul>
                    </div>
                </dd>
            </dl>
        </div>
    </form>
</div>
<script>
//按钮先执行验证再提交表
$(function() {
    $('#cls_full').click(function() {
        $('input[name="cache[]"]').attr('checked', $(this).attr('checked') == 'checked');
    });
});
</script>

</body>
</html>