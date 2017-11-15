<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:85:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\database\index.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\Public\layout.html";i:1510727775;s:81:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\public\nav.html";i:1510727775;}*/ ?>
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
		    <h3>数据库</h3>
		    <h5>数据库恢复与备份</h5>
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
		  <h4 class="itip" alt="提示相关设置操作时应注意的要点">操作提示</h4>
		  <span id="explanationZoom" class="itip" alt="收起提示"></span> </div>
		<ul>
		  <li>数据备份功能根据你的选择备份全部数据或指定数据，导出的数据文件可用“数据恢复”功能或 phpMyAdmin 导入</li>
		  <li>建议定期备份,优化和修复数据库</li>
		  <li>数据库配置修改请编辑apps/common/conf/admin/config.php</li>
		</ul>
	</div>
	<!-- 表格 -->
	<form id="export-form" method="post" action="<?php echo url('database/export'); ?>">
	<div class="table_list">
		<div class="mDiv"><div class="ftitle"><h3>数据库列表</h3><h5></h5></div></div>
		<div class="hDiv">
		    <table width="100%">
		    <thead>
		      <tr>
		        <td width="20"><label><input class="check-all" checked="chedked" type="checkbox" value=""></label></td>
				<td width="150" align="center">表名</td>
				<td width="120" align="center">数据量</td>
				<td width="120" align="center">数据大小</td>
				<td width="150" align="center">创建时间</td>
				<td width="150" align="center">说明</td>
				<td width="150" align="center">备份状态</td>
		      </tr>
		    </thead>
		    </table>
		</div>

		<div class="tDiv">
		  <div class="tDiv2">
             <div class="fbutton"><div id="export"><span><i class="icon iconfont icon-beifenruanjian"></i>立即备份</span></div></div>
             <div class="fbutton"><div><span><i class="icon iconfont icon-Group"></i><a id="optimize" href="<?php echo url('database/optimize'); ?>">优化表</a></span></div></div>
             <div class="fbutton"><div><span><i class="icon iconfont icon-zidongxiufu"></i><a id="repair" href="<?php echo url('database/repair'); ?>">修复表</a></span></div></div>
		  </div>
		  <div style="clear:both"></div>
		</div>

		<div class="bDiv">
			<table width="100%">
			<tbody>
		      <?php if(is_array($_list) || $_list instanceof \think\Collection || $_list instanceof \think\Paginator): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table): $mod = ($i % 2 );++$i;?>
		        <tr>
		          <td width="20"><input class="ids" checked="chedked" type="checkbox" name="tables[]" value="<?php echo $table['name']; ?>"></td>
		          <td width="150" align="center"><?php echo $table['name']; ?></td>
		          <td width="120" align="center"><?php echo $table['rows']; ?></td>
		          <td width="120" align="center"><?php echo format_bytes($table['data_length']); ?></td>
		          <td width="150" align="center"><?php echo $table['create_time']; ?></td>
		          <td width="150" align="center"><?php echo $table['comment']; ?></td>
		          <td width="150" align="center" class="info">未备份</td>
		        </tr>
		      <?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
			</table>
		</div>
	</div>
	</form>
</div>
<script>
$(function(){
	var $form = $("#export-form"), $export = $("#export"), tables
        $optimize = $("#optimize"), $repair = $("#repair");

        $optimize.add($repair).click(function(){
            $.post(this.href, $form.serialize(), function(data){
                if(data.code){
                    layer.msg(data.msg, {icon: 1});
                } else {
                    layer.msg(data.msg, {icon: 5});
                }
            }, "json");
            return false;
        });

        $export.click(function(){
            $export.parent().children().addClass("disabled");
            $export.html("<i class='icon iconfont icon-fasong'></i>正在发送备份请求...");
            $.post(
                $form.attr("action"),
                $form.serialize(),
                function(data){
                    if(data.code){
                        tables = data.data.tables;
                        $export.html(data.msg + "开始备份，请不要关闭本页面！");
                        backup(data.data.tab);
                        window.onbeforeunload = function(){ return "正在备份数据库，请不要关闭！" }
                    } else {
                        layer.msg(data.msg, {icon: 5});
                        $export.parent().children().removeClass("disabled");
                        $export.html("立即备份");
                        /*setTimeout(function(){
        	                $('#top-alert').find('button').click();
        	                $(that).removeClass('disabled').prop('disabled',false);
        	            },1500);*/
                    }
                },
                "json"
            );
            return false;
        });

        function backup(tab, code){
            code && showmsg(tab.id, "开始备份...(0%)");
            $.get($form.attr("action"), tab, function(data){
                if(data.code){
                    showmsg(tab.id, data.msg);
                    if(!$.isPlainObject(data.data.tab)){
                        $export.parent().children().removeClass("disabled");
                        $export.html("<i class='icon iconfont icon-wancheng'></i>备份完成，点击重新备份");
                        window.onbeforeunload = function(){ return null }
                        return;
                    }
                    backup(data.data.tab, tab.id != data.data.tab.id);
                } else {
                    layer.msg(data.msg, {icon: 5});
                    $export.parent().children().removeClass("disabled");
                    $export.html("立即备份");
                    /*setTimeout(function(){
    	                $('#top-alert').find('button').click();
    	                $(that).removeClass('disabled').prop('disabled',false);
    	            },1500);*/
                }
            }, "json");

        }

        function showmsg(id, msg){
            $form.find("input[value=" + tables[id] + "]").closest("tr").find(".info").html(msg);
        }
});
</script>
</div>

</body>
</html>