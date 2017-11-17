<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:87:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/content\view\category\index.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/Admin\view\Public\layout.html";i:1510727775;}*/ ?>
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
        <h3>栏目分类管理</h3>
        <h5>所有前台栏目索引及管理</h5>
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
      <li>请在添加、修改栏目全部完成后，点击<a href="<?php echo url('category/public_cache'); ?>" class="red">更新栏目缓存</a>，否则可能出现未知错误</li>
    </ul>
  </div>
  <!-- 表格 -->
  <div class="table_list">
    <div class="mDiv"><div class="ftitle"><h3>权限组列表</h3><h5></h5></div></div>
    <div class="hDiv">
        <table width="100%">
        <thead>
          <tr>
          <td width="50"  align="center" class="sort">排序</td>
          <td width="150" class="handle" align="center">操作</td>
          <td width="60" align="center">栏目ID</td>
          <td width="250" align="left">栏目名称</td>
          <td width="70" align="center">栏目类型</td>
          <td width="70" align="center">所属模型</td>
          <td width="100" align="center">访问</td>
          <td width="100" align="center">域名绑定须知</td>
          </tr>
        </thead>
        </table>
    </div>

    <div class="tDiv">
      <div class="tDiv2">
        <div class="fbutton"><div class="add"><span><i class="icon iconfont icon-lanmuguanli"></i><a href="<?php echo url('content/category/add'); ?>">添加栏目</a></span></div></div>
        <div class="fbutton"><div class="add"><span><i class="icon iconfont icon-danye"></i><a href="<?php echo url('content/category/singlepage'); ?>">添加单网页</a></span></div></div>
        <div class="fbutton"><div class="add"><span><i class="icon iconfont icon-lianjie"></i><a href="<?php echo url('content/category/wadd'); ?>">添加外部链接</a></span></div></div>
        </div>
      <div style="clear:both"></div>
    </div>

    <div class="bDiv">
      <table width="100%">
      <tbody>
        <?php echo $categorys; ?>
      </tbody>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript" src="__STATIC__/admin/js/jquery.edit.js"></script>
<script type="text/javascript">
$(function(){
    $('span[nc_type="inline_edit"]').inline_edit({act: '<?php echo url("content/category/listorder"); ?>'});
});
</script>

</body>
</html>