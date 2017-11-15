<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/links\view\links\index.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/Admin\view\Public\layout.html";i:1510727775;}*/ ?>
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
		    <h3>友情链接</h3>
		    <h5>友情链接中心及分类管理操作</h5>
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
		  <li></li>
		</ul>
	</div>
	<!-- 表格 -->
		<div class="table_list">
		<div class="mDiv"><div class="ftitle"><h3>友情链接列表</h3><h5></h5></div></div>
		<div class="hDiv">
		    <table width="100%">
		    <thead>
		      <tr>
                <td width="20"><label><input class="check-all" checked="chedked" type="checkbox" value=""></label></td>
                <td width="50" class="sort" align="center">排序</td>
            	<td width="150" align="center">操作</td>
		        <td width="60"  align="center">ID</td>
		        <td width="100" align="center">LOGO</td>
		        <td width="150" align="center">名称</td>
		        <td width="100" align="center">分类</td>
		        <td width="250" align="center">描述</td>
		      </tr>
		    </thead>
		    </table>
		</div>

		<div class="tDiv">
		  <div class="tDiv2">
		    <div class="fbutton"><div class="add"><span><i class="icon iconfont icon-lianjie"></i><a href="<?php echo url('links/add'); ?>">新增链接</a></span></div></div>
		    <div class="fbutton"><div class="add"><span><i class="icon iconfont icon-caidan"></i><a href="<?php echo url('links/terms'); ?>">分类管理</a></span></div></div>
		  </div>
		  <div style="clear:both"></div>
		</div>

		<div class="bDiv">
			<table width="100%">
			<tbody>
	          <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	              <tr>
	              <td width="20"><input class="ids" checked="chedked" type="checkbox" name="ids[]" value="<?php echo $vo['id']; ?>"></td>
	              <td width="50" align="center" class="sort"><span alt="可编辑" column_id="<?php echo $vo['id']; ?>" fieldname="gc_sort" nc_type="inline_edit" class="editable itip"><?php echo $vo['listorder']; ?></span></td>
	              <td width="150" align="center">
	                 <a href="<?php echo url('links/edit',array('id'=>$vo['id'])); ?>" class="btn blue"><i class="icon iconfont icon-edit"></i>编辑<a>
	                 <a class="btn red ajax-get confirm" url="<?php echo url('links/delete',array('ids'=>$vo['id'])); ?>"><i class="icon iconfont icon-shanchu"></i>删除<a>
	              </td>
	              <td width="60"  align="center"><?php echo $vo['id']; ?></td>
	              <td width="100" align="center"><?php if(empty($vo['image']) || (($vo['image'] instanceof \think\Collection || $vo['image'] instanceof \think\Paginator ) && $vo['image']->isEmpty())): ?>暂无logo<?php else: ?><i class="icon iconfont icon-tupian ft20" ></i><?php endif; ?></td>
	              <td width="150" align="center"><?php echo $vo['name']; ?></td>
	              <td width="100" align="center"><?php if(!(empty($vo['termsid']) || (($vo['termsid'] instanceof \think\Collection || $vo['termsid'] instanceof \think\Paginator ) && $vo['termsid']->isEmpty()))): ?><?php echo $Terms[$vo['termsid']]; endif; ?></td>
	              <td width="250" align="center"><?php echo $vo['description']; ?></td>
	              </tr>
	          <?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
			</table>
		</div>

	</div>
</div>
<script type="text/javascript" src="__STATIC__/admin/js/jquery.edit.js"></script>
<script type="text/javascript">
$(function(){
    $('span[nc_type="inline_edit"]').inline_edit({act: '<?php echo url("links/links/listorder"); ?>'});
});
</script>

</body>
</html>