<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\config\mail.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\Public\layout.html";i:1510727775;s:81:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\public\nav.html";i:1510727775;}*/ ?>
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
      <h4 alt="提示相关设置操作时应注意的要点" class="itip">操作提示</h4>
      <span id="explanationZoom" alt="收起提示" class="itip"></span>
    </div>
    <ul>
      <li>填写邮件服务器相关参数，并点击“测试”按钮进行效验，保存后生效。</li>
    </ul>
  </div>
  <form action="<?php echo url('config/index'); ?>" id="handlepost" method="post" class="form-horizontal" name="form">
    <div class="ncap-form-default">
    <dl class="row">
      <dt class="tit">
        <label for="mail_server">邮件服务器</label>
      </dt>
      <dd class="opt">
        <input id="mail_server" name="mail_server" value="<?php echo $Site['mail_server']; ?>" class="input-txt" type="text">
        <p class="notic">设置服务器的地址，如 smtp.163.com; 不建议使用QQ个人邮箱，有所限制</p>
      </dd>
    </dl>
    <dl class="row">
      <dt class="tit">
        <label for="mail_port">邮件发送端口</label>
      </dt>
      <dd class="opt">
        <input id="mail_port" name="mail_port" value="<?php echo $Site['mail_port']; ?>" class="input-txt" type="text">
        <p class="notic">设置服务器的端口，默认为 25（如果使用Gmail，请将端口设为465）</p>
      </dd>
    </dl>
    <dl class="row">
      <dt class="tit">
        <label for="mail_from">发件人地址</label>
      </dt>
      <dd class="opt">
        <input id="mail_from" name="mail_from" value="<?php echo $Site['mail_from']; ?>" class="input-txt" type="text">
        <p class="notic">发送的邮件地址，如 yzncms@163.com</p>
      </dd>
    </dl>
    <dl class="row">
      <dt class="tit">
        <label for="mail_user">身份验证用户名</label>
      </dt>
      <dd class="opt">
        <input id="mail_user" name="mail_user" value="<?php echo $Site['mail_user']; ?>" class="input-txt" type="text">
        <p class="notic">如果使用163或126邮箱，填写完整，如 yzncms@163.com</p>
      </dd>
    </dl>
    <dl class="row">
      <dt class="tit">
        <label for="mail_password">身份验证密码</label>
      </dt>
      <dd class="opt">
        <input id="mail_password" name="mail_password" value="<?php echo $Site['mail_password']; ?>" class="input-txt" type="password">
        <p class="notic">邮件的密码，如果使用163或126邮箱，填写授权码。具体请参看各STMP服务商的设置说明</p>
      </dd>
    </dl>
    <dl class="row">
        <dt class="tit">测试接收的邮件地址</dt>
        <dd class="opt">
          <input type="text" value="" name="mail_to" id="mail_to" class="input-txt">
          <input type="button" onClick="javascript:test_mail();" value="测试" name="send_test_email" class="input-btn" id="send_test_email">
        </dd>
      </dl>
    <div class="fix-bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="document.form.submit()">确认提交</a></div>
    </div>
  </form>
</div>
<script>
function test_mail() {
    var email = $('#mail_to').val();
    if (email == '') {
        layer.alert("请填写正确的测试邮箱账号！",{icon:2});
        return;
    } else {
        $.ajax({
            type: "post",
            data: $('#handlepost').serialize(),
            dataType: 'json',
            url: "<?php echo url('config/public_test_mail','',''); ?>",
            success: function (res) {
                if (res.status == 1) {
                    layer.msg('发送成功', {icon: 1});
                } else {
                    layer.msg(res.msg, {icon: 2, time: 2000});
                }
            }
        })
    }
}
</script>

</body>
</html>