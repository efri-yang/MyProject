<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\manager\index.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\Public\layout.html";i:1510727775;}*/ ?>
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
		    <h3>管理员管理</h3>
		    <h5>网站后台管理员索引及管理</h5>
		  </div>
		</div>
	</div>
	<!-- 表格 -->
	<div class="table_list">
		<div class="mDiv"><div class="ftitle"><h3>管理员列表</h3><h5></h5></div></div>
		<div class="hDiv">
		    <table width="100%">
		    <thead>
		      <tr>
				<td width="150" align="center">操作</td>
				<td width="150" align="center">登录名</td>
				<td width="120" align="center">所属角色</td>
				<td width="120" align="center">最后登录IP</td>
				<td width="120" align="center">最后登录时间</td>
				<td width="120"  align="center">E-mail</td>
				<td width="120"  align="center">真实姓名</td>
		      </tr>
		    </thead>
		    </table>
		</div>

		<div class="tDiv">
		  <div class="tDiv2">
		    <div class="fbutton">
		        <div class="add"><span><i class="icon iconfont icon-guanliyuan"></i><a href="<?php echo url('admin/manager/add'); ?>">添加管理员</a></span></div>
		    </div>
		  </div>
		  <div style="clear:both"></div>
		</div>

		<div class="bDiv">
			<table width="100%">
			<tbody>
				<?php if(is_array($_list) || $_list instanceof \think\Collection || $_list instanceof \think\Paginator): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr>
				  <td width="150" align="center"><a class="btn red" href="<?php echo url('admin/manager/del',['id'=>$vo['userid']]); ?>" onclick="if(confirm('删除后将不能恢复，确认删除这  1 项吗？')){return true;} else {return false;}"><i class="icon iconfont icon-shanchu"></i>删除</a>
				  <a class="btn blue" href="<?php echo url('admin/manager/edit',['id'=>$vo['userid']]); ?>"><i class="icon iconfont icon-edit"></i>编辑</a></td>
				  <td width="150" align="center"><?php echo $vo['username']; ?></td>
				  <td width="120" align="center"><?php  echo model('Admin/AuthGroup')->getRoleIdName($vo['roleid'])  ?></td>
				  <td width="120" align="center"><?php  echo $vo['last_login_ip'] ? long2ip($vo['last_login_ip']) : '--'  ?></td>
				  <td width="120" align="center"><?php  echo $vo['last_login_time'] ? time_format($vo['last_login_time']) : '--'  ?></td>
				  <td width="120" align="center"><?php echo $vo['email']; ?></td>
				  <td width="120" align="center"><?php echo $vo['nickname']; ?></td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
			</table>
		</div>
	</div>
</div>

</body>
</html>