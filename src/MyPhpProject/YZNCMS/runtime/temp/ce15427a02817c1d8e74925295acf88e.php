<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/content\view\content\add.html";i:1510727775;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>添加内容</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link href="__STATIC__/admin/css/main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="__STATIC__/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/layer/layer.js"></script>
<script type="text/javascript" src="__STATIC__/js/laydate/laydate.js"></script>
</head>
<body>
<script type="text/javascript">
    var upurl ="<?php echo url('attachment/attachments/WebUploader','',''); ?>";
</script>
<style type="text/css">
body{ color: #666; font-size: 12px;background-color: #F6F7FB; line-height: 1.5; overflow-x: hidden; overflow-y: auto;}
.ncsc-layout { flex: 1 0 auto; padding: 20px 0px 70px;}
.wrapper {width: 1200px; margin: auto; }
.ncsc-layout-left {background-color: #FFF; width: 950px; min-height: 640px; float: left; position: relative; z-index: 1;box-shadow: 0 0 10px #ccc;}
/*.ncsc-layout-left input[type="text"]{width: 250px;}*/
.ncsc-layout-right{float: right;width: 240px;background-color: #FFF;box-shadow: 0 0 10px #ccc;}
/*.ncsc-layout-right input[type="text"]{width: 200px;}*/
.ncsc-form-zhu {border: solid #E6E6E6; border-width: 1px 1px 0 1px; }
.ncsc-form-fu {border: solid #E6E6E6; border-width: 1px 1px 0 1px; }
.ncsc-form-zhu h3 {font-size: 14px; font-weight: 600; line-height: 22px; color: #000; clear: both; background-color: #F5F5F5; padding: 5px 0 5px 12px; border-bottom: solid 1px #E7E7E7; font-weight: normal; }
.ncsc-layout th{padding: 7px 10px 9px;  border-right: 1px solid #E6E6E6;border-bottom: 1px solid #E6E6E6; line-height: 24px; vertical-align: top;text-align: right;}
.ncsc-layout td{padding: 9px 10px 9px 15px; color: #666; vertical-align: top;border-bottom: 1px solid #E6E6E6;}
/*.ncsc-layout tr:nth-child(even) {background-color: #FDFDFD; }*/

.hint {font-size: 12px; line-height: 16px; color: #BBB; margin-top: 10px; }
.ncsc-form tr:hover .hint { color: #666;}

i.required {font: 12px/16px Tahoma; color: #F30; vertical-align: middle; margin-right: 4px; }
.length_3 {width: 200px; }
</style>
<form name="myform" id="myform" action="<?php echo url('content/add'); ?>" method="post" class="J_ajaxForms" enctype="multipart/form-data">
<div class="ncsc-layout wrapper">
	<div class="ncsc-layout-left">
		<div class="ncsc-form-zhu ncsc-form">
			<h3 id="demo1">信息发布</h3>
			    <table width="100%">
			    <tbody>
				<?php 
				if(is_array($forminfos['base'])) {
				   foreach($forminfos['base'] as $field=>$info) {
				       if($info['isomnipotent']) continue;//万能字段跳出
				 ?>
				<tr>
					<th width="80"><?php if($info['star']): ?><i class="required">*</i><?php endif; ?><?php echo $info['name']; ?></th>
					<td>
					    <?php echo $info['form']; ?>
					    <span id="err_goods_name"></span>
					    <p class="hint"><?php echo $info['tips']; ?></p>
					</td>
				</tr>
				<?php 
				   }
				}
				 ?>
				</tbody>
				</table>
		</div>
	</div>

	<div class="ncsc-layout-right">
	    <div class="ncsc-form-fu ncsc-form">
	    <table width="100%">
	    <tbody>
		<?php 
		if(is_array($forminfos['senior'])) {
		foreach($forminfos['senior'] as $field=>$info) {
		if($info['isomnipotent']) continue;//万能字段跳出
		 ?>
		<tr>
			<td><?php if($info['star']): ?><i class="required">*</i><?php endif; ?><b><?php echo $info['name']; ?></b></td>
		</tr>
		<tr>
			<td>
			    <?php echo $info['form']; ?>
			    <span id="err_goods_name"></span>
			    <p class="hint"><?php echo $info['tips']; ?></p>
			</td>
		</tr>
		<?php 
		}
		}
		 ?>
		</tbody>
		</table>
		</div>
    </div>
	<input type="hidden" name="catid" value="<?php echo $catid; ?>"/>
	<div class="clear" style="height: 10px;"></div>
    <div class="fix-bot">
          <a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="document.myform.submit()">确认提交</a>
          <a class="ncap-btn-big ncap-btn-red ml10 Close_btn">关闭</a>
    </div>
</div>
</form>
<script type="text/javascript" src="__STATIC__/admin/js/content_addtop.js"></script>
<script type="text/javascript">
$(function () {
	//执行一个laydate实例
	lay('.J_datetime').each(function(){
	  laydate.render({
	    elem: this,trigger: 'click',type: 'datetime'
	  });
	});
	$(".Close_btn").on('click', function () {
		layer.confirm('您确定需要关闭当前页面嘛', function(){
		   window.close();
		});
	});
});
</script>
</body>
</html>