<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:91:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\database\repair_list.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\Public\layout.html";i:1510727775;s:81:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\public\nav.html";i:1510727775;}*/ ?>
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
      <li>点击导入选项进行数据库恢复</li>
    </ul>
  </div>
  <!-- 表格 -->
  <div class="table_list">
    <div class="mDiv"><div class="ftitle"><h3>数据库备份列表</h3><h5></h5></div></div>
    <div class="hDiv">
        <table width="100%">
        <thead>
          <tr>
              <td width="150" align="center">操作</td>
              <td width="150" align="center">备份名</td>
              <td width="150" align="center">备份时间</td>
              <td width="150" align="center">备份大小</td>
              <td width="100" align="center">卷数</td>
              <td width="100" align="center">压缩</td>
              <td width="100" align="center">状态</td>
          </tr>
        </thead>
        </table>
    </div>

    <div class="bDiv">
      <table width="100%">
      <tbody>
        <?php if(is_array($_list) || $_list instanceof \think\Collection || $_list instanceof \think\Paginator): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
        <tr class="hover">
            <td width="150" align="center" class="handle">
            <span class="btn"><em><i class="icon iconfont icon-shezhi"></i>设置<i class="arrow"></i></em>
              <ul><li><a href="javascript:if(confirm('您确定要删除吗?')){location.href='<?php echo url('del?time='.$data['time']); ?>'};">删除</a></li>
                  <li><a class="confirm-on-click" href="<?php echo url('import?time='.$data['time']); ?>">导入</a></li>
                  <li><a href="<?php echo url('downFile',array('type'=>'gz','file'=>date('Ymd-His',$data['time']))); ?>">下载</a></li>
              </ul>
            </span>
            </td>
            <td width="150" align="center"><?php echo date('Ymd-His',$data['time']); ?></td>
            <td width="150" align="center"><?php echo $key; ?></td>
            <td width="150" align="center"><?php echo format_bytes($data['size']); ?></td>
            <td width="100" align="center"><?php echo $data['part']; ?></td>
            <td width="100" align="center"><?php echo $data['compress']; ?></td>
            <td width="100" align="center" class="info">-</td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
$('.confirm-on-click').live('click', function() {
  var self = this, status = ".";
  if(confirm('确认导入这项吗？')){
      } else {
      return false;
  }
  $.get(self.href, success, "json");
  window.onbeforeunload = function(){ return "正在还原数据库，请不要关闭！" }
  return false;

  function success(data){
      if(data.code){
          if(data.data.gz){
              data.msg += code;
              if(code.length === 5){
                  code = ".";
              } else {
                  code += ".";
              }
          }
          $(self).parents('tr').find('td.info').text(data.msg);
          $(self).parent().prev().text(data.info);
          if(data.data.part){
              $.get(self.href,
                  {"part" : data.data.part, "start" : data.data.start},
                  success,
                  "json"
              );
          }  else {
              window.onbeforeunload = function(){ return null; }
          }
      } else {
          $(self).parents('tr').find('.info').text(data.msg);
      }
  }
});
</script>

</body>
</html>