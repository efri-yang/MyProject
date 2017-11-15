<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/links\view\links\edit.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/Admin\view\Public\layout.html";i:1510727775;}*/ ?>
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
    <div class="item-title"><a class="back" href="<?php echo url('links/index'); ?>" title="返回列表"><i class="icon iconfont icon-fanhui"></i></a>
      <div class="subject">
        <h3>链接设置 - 编辑链接</h3>
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
  <form action="<?php echo url('links/edit'); ?>" name="adminForm" id="add_form" enctype="application/x-www-form-urlencoded" method="POST" class="form-horizontal auth-form">
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label for="termsid"><em>*</em>所属分类</label>
        </dt>
        <dd class="opt">
            <select name="termsid" class="valid">
                <option value="0">==默认分类==</option>
                <?php if(is_array($Terms) || $Terms instanceof \think\Collection || $Terms instanceof \think\Paginator): $i = 0; $__LIST__ = $Terms;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $key; ?>" <?php if($key == $data['termsid']): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
          <span class="err"></span>
          <p class="notic">请选择一个分类，如果还未设置，请在分类管理建立分类。</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="name"><em>*</em>网站名称</label>
        </dt>
        <dd class="opt">
          <input type="text"  value="<?php echo $data['name']; ?>" maxlength="40"  name="name" class="input-txt">
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="url"><em>*</em>网站链接</label>
        </dt>
        <dd class="opt">
          <input type="text"  value="<?php echo $data['url']; ?>" maxlength="100"  name="url" class="input-txt">
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="catdir">LOGO</label>
        </dt>
        <dd class="opt">
          <div class="input-file-show">
          <?php  echo \util\Form::images('image', 'image',$data['image'], 'links');  ?>
          </div>
          <span class="err"></span>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="description">链接描述</label>
        </dt>
        <dd class="opt">
          <textarea name="description" rows="6" class="tarea"><?php echo $data['description']; ?></textarea>
        </dd>
      </dl>
      <input name="id" type="hidden" value="<?php echo $data['id']; ?>" />
      <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="document.adminForm.submit()">确认提交</a></div>
    </div>
  </form>
</div>
<script type="text/javascript">
    var upurl ="<?php echo url('attachment/attachments/WebUploader','',''); ?>";
</script>
<script type="text/javascript" src="__STATIC__/admin/js/content_addtop.js"></script>

</body>
</html>