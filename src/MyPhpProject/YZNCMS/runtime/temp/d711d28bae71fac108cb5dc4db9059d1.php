<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\config\extend.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\Public\layout.html";i:1510727775;s:81:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\public\nav.html";i:1510727775;}*/ ?>
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
        <h3>网站设置</h3>
        <h5>网站全局内容基本选项设置</h5>
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
      <li>扩展配置 ，用法：模板调用标签：{:cache('Config.键名')}，PHP代码中调用：cache('Config.键名');</li>
    </ul>
  </div>
  <!-- 表格 -->
  <form action="<?php echo url('config/extend'); ?>" method="post" class="form-horizontal" name="form2">
  <div class="table_list">
    <div class="mDiv"><div class="ftitle"><h3>扩展配置列表</h3><h5></h5></div></div>
    <div class="hDiv">
        <table width="100%">
        <thead>
          <tr>
            <td width="150" align="center" class="handle">操作</td>
            <td width="100" align="left">名称</td>
            <td width="120" align="center">键名</td>
            <td width="300" align="center">配置值</td>
            <td width="120" align="center">提示</td>
          </tr>
        </thead>
        </table>
    </div>

    <div class="tDiv">
      <div class="tDiv2">
             <div class="fbutton"><div class="add" id="export"><span><i class="icon iconfont icon-beifenruanjian"></i><a href="<?php echo url('config/add'); ?>">添加配置</a></span></div></div>
      </div>
      <div style="clear:both"></div>
    </div>

    <div class="bDiv">
      <table width="100%">
      <tbody>
        <?php if(is_array($extendList) || $extendList instanceof \think\Collection || $extendList instanceof \think\Paginator): $i = 0; $__LIST__ = $extendList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;$setting = unserialize($vo['setting']); ?>
        <tr>
          <td width="150" align="center">
          <a class="btn red" href="<?php echo url('config/extend',array('fid'=>$vo['fid'],'action'=>'delete')); ?>" onclick="if(confirm('删除后将不能恢复，确认删除这  1 项吗？')){return true;} else {return false;}"><i class="fa fa-trash-o"></i>删除</a>
          </td>
          <td width="100" align="left"><?php echo $setting['title']; ?></td>
          <td width="120" align="center"><?php echo $vo['fieldname']; ?></td>
          <td width="300" align="center">
          <?php switch($vo['type']): case "input": ?>
          <input type="text" class="input" style="<?php echo $setting['style']; ?>"  name="<?php echo $vo['fieldname']; ?>" value="<?php echo $Site[$vo['fieldname']]; ?>">
          <?php break; case "select": ?>
          <select name="<?php echo $vo['fieldname']; ?>">
          <?php if(is_array($setting['option']) || $setting['option'] instanceof \think\Collection || $setting['option'] instanceof \think\Paginator): $i = 0; $__LIST__ = $setting['option'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?>
               <option value="<?php echo $rs['value']; ?>" <?php if($Site[$vo['fieldname']] == $rs['value']): ?>selected<?php endif; ?>><?php echo $rs['title']; ?></option>
          <?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
          <?php break; case "textarea": ?>
          <textarea name="<?php echo $vo['fieldname']; ?>" style="<?php echo $setting['style']; ?>"><?php echo $Site[$vo['fieldname']]; ?></textarea>
          <?php break; case "radio": if(is_array($setting['option']) || $setting['option'] instanceof \think\Collection || $setting['option'] instanceof \think\Paginator): $i = 0; $__LIST__ = $setting['option'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?>
          <input name="<?php echo $vo['fieldname']; ?>" value="<?php echo $rs['value']; ?>" type="radio"  <?php if($Site[$vo['fieldname']] == $rs['value']): ?>checked<?php endif; ?>> <?php echo $rs['title']; endforeach; endif; else: echo "" ;endif; break; case "password": ?>
          <input type="password" class="input" style="<?php echo $setting['style']; ?>"  name="<?php echo $vo['fieldname']; ?>" value="<?php echo $Site[$vo['fieldname']]; ?>">
          <?php break; endswitch; ?>
          </td>
          <td width="120" align="center"><?php echo $setting['tips']; ?></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
      </table>
      <div class="fix-bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="document.form2.submit()">确认提交</a></div>
    </div>
  </div>
  </form>
</div>

</body>
</html>