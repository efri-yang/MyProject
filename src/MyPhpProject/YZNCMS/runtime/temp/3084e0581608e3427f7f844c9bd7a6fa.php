<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:90:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/content\view\content\classlist.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/Admin\view\Public\layout.html";i:1510727775;}*/ ?>
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
        <h3>栏目信息列表管理</h3>
        <h5>各栏目信息索引及管理</h5>
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
    <div class="mDiv"><div class="ftitle"><h3>权限组列表</h3><h5></h5></div></div>
    <div class="hDiv">
        <table width="100%">
        <thead>
          <tr>
          <td width="20"><label><input class="check-all" checked="chedked" type="checkbox" value=""></label></td>
          <td width="50"  align="center" class='sort'>排序</td>
          <td width="150" class="handle" align="center">操作</td>
          <td width="60" align="center">ID</td>
          <td width="250" align="center">标题</td>
          <td width="70" align="center">点击量</td>
          <td width="100" align="center">发布人</td>
          <td width="150" align="center">发帖时间</td>
          </tr>
        </thead>
        </table>
    </div>

    <div class="tDiv">
      <div class="tDiv2">
        <div class="fbutton">
             <div class="add"><span><i class="icon iconfont icon-lanmuguanli"></i>
                   <a href="javascript:void(0)" onclick="javascript:openwinx('<?php echo url('content/add',array('catid'=>$catid)); ?>','')">添加内容</a>
            </span></div>
        </div>
        <div class="fbutton"><div class="add ajax-post confirm" target-form="ids" url="<?php echo url('content/delete',array('catid'=>$catid)); ?>"><span><i class="icon iconfont icon-shanchu"></i>批量删除</span></div></div>
      </div>
      <div style="clear:both"></div>
    </div>

    <div class="bDiv">
      <table width="100%">
      <tbody>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td width="20"><input class="ids" checked="chedked" type="checkbox" name="ids[]" value="<?php echo $vo['id']; ?>"></td>
            <td width="50"  align="center" class="sort"><span alt="可编辑" column_id="<?php echo $vo['id']; ?>" fieldname="gc_sort" nc_type="inline_edit" class="itip editable"><?php echo $vo['listorder']; ?></span></td>
            <td width="150" align="center">
            <span class="btn"><em><i class="icon iconfont icon-shezhi"></i>设置<i class="arrow"></i></em>
              <ul>
                  <li><a href="javascript:;" onClick="javascript:openwinx('<?php echo url('content/edit',array('catid'=>$vo['catid'],'id'=>$vo['id'])); ?>','')">编辑</a></li>
                  <li><a href="<?php echo url('content/delete',array('catid'=>$vo['catid'],'ids'=>$vo['id'])); ?>">删除</a></li>
              </ul>
            </span>
            </td>
            <td width="60"  align="center"><?php echo $vo['id']; ?></td>
            <td width="250" align="center"><?php echo $vo['title']; if(!(empty($vo['posid']) || (($vo['posid'] instanceof \think\Collection || $vo['posid'] instanceof \think\Paginator ) && $vo['posid']->isEmpty()))): ?>
              <i class="icon iconfont icon-jian itip" alt="推荐位"></i>
              <?php endif; ?>
            </td>
            <td width="70"  align="center"><?php echo $vo['views']; ?></td>
            <td width="100" align="center"><?php echo $vo['username']; ?></td>
            <td width="150" align="center"><?php echo date("Y-m-d H:i:s",$vo['updatetime']); ?></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
      </table>
    </div>
    <div class="pDiv"><div class="pDiv2"><?php echo $_page; ?></div></div>
  </div>
</div>
<script type="text/javascript" src="__STATIC__/admin/js/jquery.edit.js"></script>
<script type="text/javascript">
$(function(){
    $('span[nc_type="inline_edit"]').inline_edit({act: '<?php echo url("content/listorder",array('catid'=>$catid)); ?>'});
});
</script>

</body>
</html>