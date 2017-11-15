<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:86:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/content\view\content\index.html";i:1510727775;s:84:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/Admin\view\Public\layout.html";i:1510727775;}*/ ?>
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

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="180">
    <iframe name="left" id="iframe_categorys" src="<?php echo url('content/public_categorys'); ?>" style="height: 100%; width: 180px;"  frameborder="0" scrolling="auto"></iframe></td>
    <td width="3" bgcolor="#CCCCCC">
    </td>
    <td>
    <iframe name="right" id="iframe_categorys_list" src="<?php echo url('admin/main/index'); ?>"   style="height: 100%; width:100%;border:none;"   frameborder="0" scrolling="auto"></iframe></td>
  </tr>
</table>
<script type="text/javascript">
var B_frame_height = parent.$(".admincp-container-right").height()-50;
$(window).on('resize', function () {
    setTimeout(function () {
    B_frame_height = parent.$(".admincp-container-right").height()-50;
        frameheight();
    }, 100);
});
function frameheight(){
  $("#iframe_categorys").height(B_frame_height);
  $("#iframe_categorys_list").height(B_frame_height);
}
(function (){
  frameheight();
})();
</script>

</body>
</html>