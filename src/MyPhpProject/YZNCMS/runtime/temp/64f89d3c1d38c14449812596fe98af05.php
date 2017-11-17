<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:87:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/content\view\position\index.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/Admin\view\Public\layout.html";i:1510727775;}*/ ?>
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
		    <h3>推荐位管理</h3>
		    <h5>推荐位新增及修改管理</h5>
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
		   <li>如果您已经修改模型字段管理中“在推荐位标签中调用”这个选项，可以使用“数据重建”功能进行数据重建！</li>
		</ul>
	</div>
	<!-- 表格 -->
	<div class="table_list">
		<div class="mDiv"><div class="ftitle"><h3>推荐位列表</h3><h5></h5></div></div>
		<div class="hDiv">
		    <table width="100%">
		    <thead>
		      <tr>
		      	  <td width="50"  align="center" class="sort">排序</td>
		          <td width="50" align="center">ID</td>
		          <td width="150" class="handle" align="center">管理操作</td>
		          <td width="130" align="center">推荐位名称</td>
		          <td width="80" align="center">所属栏目</td>
		          <td width="80" align="center">所属模型</td>
		      </tr>
		    </thead>
		    </table>
		</div>

		<div class="tDiv">
		  <div class="tDiv2">
		    <div class="fbutton">
		        <div class="add"><span><i class="icon iconfont icon-jian"></i><a href="<?php echo url('position/add'); ?>">添加推荐位</a></span></div>
		    </div>
		  </div>
		  <div style="clear:both"></div>
		</div>

		<div class="bDiv">
			<table width="100%">
			<tbody>
				<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr>
					<td width="50" align="center" class="sort"><span alt="可编辑" column_id="<?php echo $vo['posid']; ?>" fieldname="gc_sort" nc_type="inline_edit" class="itip editable"><?php echo $vo['listorder']; ?></span></td>
					<td width="50" align="center"><?php echo $vo['posid']; ?></td>
					<td width="150" align="center" class="handle">
						<a class="btn blue" href="<?php echo url('position/item',['posid'=>$vo['posid']]); ?>"><i class="icon iconfont icon-neirongguanli"></i>数据管理</a>
						<a class="btn orange" href="<?php echo url(); ?>"><i class="icon iconfont icon-lanmuguanli"></i>数据重建</a>
						<a class="btn green" href="<?php echo url('position/edit',['posid'=>$vo['posid']]); ?>"><i class="icon iconfont icon-edit"></i>修改</a>
						<a class="btn red  ajax-get confirm" url="<?php echo url('position/delete',['posid'=>$vo['posid']]); ?>"><i class="icon iconfont icon-shanchu"></i>删除</a>
					</td>
					<td width="130" align="center"><?php echo $vo['name']; ?></td>
					<td width="80" align="center">
						<?php if(empty($vo['catid']) || (($vo['catid'] instanceof \think\Collection || $vo['catid'] instanceof \think\Paginator ) && $vo['catid']->isEmpty())): ?>
						<font color="#FF0000">无限制</font>
						<?php else: ?>
						多栏目
						<?php endif; ?>
					</td>
					<td width="80" align="center">
						<?php if(empty($vo['modelid']) || (($vo['modelid'] instanceof \think\Collection || $vo['modelid'] instanceof \think\Paginator ) && $vo['modelid']->isEmpty())): ?>
						<font color="#FF0000">无限制</font>
						<?php else: ?>
						多模型
						<?php endif; ?>
					</td>
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
    $('span[nc_type="inline_edit"]').inline_edit({act: '<?php echo url("content/position/listorder"); ?>'});
});
</script>

</body>
</html>