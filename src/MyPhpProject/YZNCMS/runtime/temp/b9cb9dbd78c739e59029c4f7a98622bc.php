<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/addons\view\addons\index.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/Admin\view\Public\layout.html";i:1510727775;}*/ ?>
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
                <h3>插件管理</h3>
                <h5>本地插件管理中心</h5>
            </div>
        </div>
    </div>
    <!-- 操作说明 -->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="icon iconfont icon-dengpao"></i>
            <h4 alt="提示相关设置操作时应注意的要点" class="itip">操作提示</h4>
            <span id="explanationZoom" alt="收起提示" class="itip"></span>
        </div>
        <ul>
            <li>插件管理可以很好的扩展网站运营中所需功能！</li>
        </ul>
    </div>
    <!-- 表格 -->
    <div class="table_list">
        <div class="mDiv">
            <div class="ftitle">
                <h3>插件列表</h3>
                <h5></h5></div>
        </div>
        <div class="hDiv">
            <table width="100%">
                <thead>
                    <tr>
                        <td width="190" align="center" class="handle">操作</td>
                        <td width="80" align="center">名称</td>
                        <td width="80" align="center">标识</td>
                        <td width="400" align="center ">描述</td>
                        <td width="50" align="center">状态</td>
                        <td width="50" align="center">作者</td>
                        <td width="50" align="center">版本</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tDiv">
            <div class="tDiv2">
                <!--<div class="fbutton"><div class="add ajax-post confirm" target-form="ids" url="<?php echo url('action/remove'); ?>"><span><i class="icon iconfont icon-shanchu"></i>批量删除</span></div></div>
                    <div class="fbutton"><div class="add ajax-get confirm" url="<?php echo url('action/clear'); ?>"><span><i class="icon iconfont icon-yue"></i>删除1个月前的数据</span></div></div>-->
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="bDiv">
            <table width="100%">
                <tbody>
                    <?php if(is_array($_list) || $_list instanceof \think\Collection || $_list instanceof \think\Paginator): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td width="190" align="center">
                        <?php if(empty($vo['uninstall']) || (($vo['uninstall'] instanceof \think\Collection || $vo['uninstall'] instanceof \think\Paginator ) && $vo['uninstall']->isEmpty())): if(isset($vo['config'])): ?>
                            <a class="btn blue" href="<?php echo url('config',array('id'=>$vo['id'])); ?>"><i class="icon iconfont icon-shezhi"></i>设置</a>
                        <?php endif; if($vo['status'] == '0'): ?>
                            <a class="btn blue ajax-get confirm" url="<?php echo url('enable',array('id'=>$vo['id'])); ?>"><i class="icon iconfont icon-qiyong"></i>启用</a>
                            <?php else: ?>
                            <a class="btn red ajax-get confirm" url="<?php echo url('disable',array('id'=>$vo['id'])); ?>"><i class="icon iconfont icon-jinyong"></i>禁用</a>
                        <?php endif; ?>

                            <a class="btn red ajax-get confirm" url="<?php echo url('uninstall?id='.$vo['id']); ?>"><i class="icon iconfont icon-shanchu"></i>卸载</a>
                        <?php else: ?>
                            <a class="btn red" href="<?php echo url('install?addon_name='.$vo['name']); ?>"><i class="icon iconfont icon-zidongxiufu"></i>安装<a>
                        <?php endif; ?>
                    </td>
                    <td width="80" align="center"><?php echo $vo['title']; ?></td>
                    <td width="80" align="center"><?php echo $vo['name']; ?></td>
                    <td width="400" align="center"><?php echo $vo['description']; ?></td>
                    <td width="50" align="center"><?php echo (isset($vo['status_text']) && ($vo['status_text'] !== '')?$vo['status_text']:"未安装"); ?></td>
                    <td width="50" align="center"><?php echo $vo['author']; ?></td>
                    <td width="50" align="center"><?php echo $vo['version']; ?></td>
                  </tr>
               <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>