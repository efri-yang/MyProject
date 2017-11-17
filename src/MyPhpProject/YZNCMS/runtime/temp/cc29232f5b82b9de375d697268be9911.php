<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:87:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\action\actionlog.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\Public\layout.html";i:1510727775;}*/ ?>
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
		    <h3>操作日志</h3>
		    <h5>管理中心管理操作日志内容</h5>
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
		  <li>系统默认关闭了操作日志，如需开启，请编辑</li>
		  <li>开启操作日志可以记录管理人员的关键操作，但会轻微加重系统负担</li>
		</ul>
	</div>
	<!-- 表格 -->
		<div class="table_list">
		<div class="mDiv"><div class="ftitle"><h3>管理员操作日志列表</h3><h5>(共<?php echo $_total; ?>记录)</h5></div></div>
		<div class="hDiv">
		    <table width="100%">
		    <thead>
		      <tr>
            <td width="20"><label><input class="check-all" checked="chedked" type="checkbox" value=""></label></td>
		        <td width="60" align="center">操作</td>
		        <td width="100" align="left">操作人</td>
		        <td width="300" align="left">行为</td>
		        <td width="140" align="center">时间</td>
		        <td width="120" align="center">IP</td>
		      </tr>
		    </thead>
		    </table>
		</div>

		<div class="tDiv">
		  <div class="tDiv2">
		    <div class="fbutton"><div class="add ajax-post confirm" target-form="ids" url="<?php echo url('action/remove'); ?>"><span><i class="icon iconfont icon-shanchu"></i>批量删除</span></div></div>
		    <div class="fbutton"><div class="add ajax-get confirm" url="<?php echo url('action/clear'); ?>"><span><i class="icon iconfont icon-yue"></i>删除1个月前的数据</span></div></div>
		  </div>
		  <div style="clear:both"></div>
		</div>

		<div class="bDiv">
			<table width="100%">
			<tbody>
			    <?php if(is_array($_list) || $_list instanceof \think\Collection || $_list instanceof \think\Paginator): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			    <tr>
                    <td width="20"><input class="ids" checked="chedked" type="checkbox" name="ids[]" value="<?php echo $vo['id']; ?>"></td>
					<td width="60" align="center"><a class="btn red ajax-get confirm" url="<?php echo url('action/remove',array('ids'=>$vo['id'])); ?>"><i class="icon iconfont icon-shanchu"></i>删除<a></td>
					<td width="100" align="left"><?php echo $vo['user_id']; ?></td>
					<td width="300" align="left"><?php echo $vo['remark']; ?></td>
					<td width="140" align="center"><?php echo date("Y-m-d H:i:s",$vo['create_time']); ?></td>
					<td width="120" align="center"><?php echo long2ip($vo['action_ip']); ?></td>
				</tr>
			    <?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
			</table>
		</div>
		<div class="pDiv"><div class="pDiv2"><?php echo $_page; ?></div></div>
	</div>
</div>

</body>
</html>