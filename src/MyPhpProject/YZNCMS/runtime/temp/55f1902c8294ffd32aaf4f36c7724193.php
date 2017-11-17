<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/content\view\models\index.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/Admin\view\Public\layout.html";i:1510727775;}*/ ?>
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
                <h3>模型分类管理</h3>
                <h5>所有后台模型索引及管理</h5>
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
            <li>暂无</li>
        </ul>
    </div>
    <!-- 表格 -->
    <div class="table_list">
        <div class="mDiv">
            <div class="ftitle">
                <h3>模型列表</h3>
                <h5></h5></div>
        </div>
        <div class="hDiv">
            <table width="100%">
                <thead>
                    <tr>
                        <td width="50" align="center">模型ID</td>
                        <td width="150" class="handle" align="center">管理操作</td>
                        <td width="130" align="center">模型名称</td>
                        <td width="80" align="center">数据表</td>
                        <td width="300" align="center">描述</td>
                        <td width="70" align="center">数据量</td>
                        <td width="70" align="center">状态</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tDiv">
            <div class="tDiv2">
                <div class="fbutton">
                    <div class="add"><span><i class="icon iconfont icon-moxing"></i><a href="<?php echo url('content/models/add'); ?>">添加模型</a></span></div>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="bDiv">
            <table width="100%">
                <tbody>
                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td width="50" align="center"><?php echo $vo['modelid']; ?></td>
                        <td width="150" align="center" class="handle">
                            <a class="btn red ajax-get confirm" url="<?php echo url('models/delete',array('modelid'=>$vo['modelid'])); ?>"><i class="icon iconfont icon-shanchu"></i>删除</a>
                            <span class="btn"><em><i class="icon iconfont icon-shezhi"></i>设置<i class="arrow"></i></em>
		            <ul>
		                <li><a href="<?php echo url('field/index',array('modelid'=>$vo['modelid'])); ?>">字段管理</a></li>
		                <li><a href="<?php echo url('models/edit',array('modelid'=>$vo['modelid'])); ?>">模型修改</a></li>
		                <li><a class="ajax-get confirm" url="<?php echo url('content/models/disabled',array('modelid'=>$vo['modelid'])); ?>"><?php if($vo['disabled'] == 0): ?>模型禁用<?php else: ?><font color="#FF0000">模型启用</font><?php endif; ?></a></li>
		            </ul>
		            </span></td>
                        <td width="130" align="center"><?php echo $vo['name']; ?></td>
                        <td width="80" align="center"><?php echo $vo['tablename']; ?></td>
                        <td width="300" align="center"><?php echo $vo['description']; ?></td>
                        <td width="70" align="center"></td>
                        <td width="70" align="center"><?php if($vo['disabled'] == '1'): ?>
                            <span class="no"><i class="icon iconfont icon-iconfontcuowu2"></i>禁用</span> <?php else: ?>
                            <span class="on"><i class="icon iconfont icon-zhengque1"></i>正常</span> <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>