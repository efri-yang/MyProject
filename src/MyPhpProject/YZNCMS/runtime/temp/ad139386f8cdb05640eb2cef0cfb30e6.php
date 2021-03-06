<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\index\index.html";i:1510727775;s:90:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\public\index_layout.html";i:1510727775;s:85:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\public\map_nav.html";i:1510727775;s:86:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\public\left_nav.html";i:1510727775;}*/ ?>
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
<title>Yzncms</title>
<link href="__STATIC__/admin/css/main.css" rel="stylesheet" type="text/css">
<link href="__STATIC__/admin/font/css/iconfont.css" rel="stylesheet" />
<script type="text/javascript">
var SITEURL = '';
var COMMON_OPERATIONS_URL = '<?php echo url("index/common_operations"); ?>';//快捷菜单路径
</script>
<script type="text/javascript" src="__STATIC__/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/layer/layer.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/common.js"></script>
<script type="text/javascript" src="__STATIC__/js/jquery.cookie.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/admincp.js"></script>
</head>
<body>
<div class="admincp-map ui-widget-content" nctype="map_nav" style="display:none;" id="draggable" >
  <div class="title ui-widget-header" >
    <h3>管理中心全部菜单</h3>
    <h5>切换显示全部管理菜单，通过点击勾选可添加菜单为管理常用操作项，最多添加10个</h5>
    <span><a nctype="map_off" href="JavaScript:void(0);">X</a></span>
   </div>
  <div class="content">
	<ul class="admincp-map-nav">
	<?php if(is_array($__MENU__) || $__MENU__ instanceof \think\Collection || $__MENU__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__MENU__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$top_nav): $mod = ($i % 2 );++$i;?>
	      <li><a href="javascript:void(0);" data-param="map-<?php echo $top_nav['id']; ?>"><?php echo $top_nav['title']; ?></a></li>
	<?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	<?php if(is_array($__MENU__) || $__MENU__ instanceof \think\Collection || $__MENU__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__MENU__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$top_nav): $mod = ($i % 2 );++$i;?>
	<div class="admincp-map-div" data-param="map-<?php echo $top_nav['id']; ?>">
	<?php if(isset($top_nav['items'])): if(is_array($top_nav['items']) || $top_nav['items'] instanceof \think\Collection || $top_nav['items'] instanceof \think\Paginator): $i = 0; $__LIST__ = $top_nav['items'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$left_nav): $mod = ($i % 2 );++$i;?>
	       <dl>
	       <dt><?php echo $left_nav['title']; ?></dt>
	<?php if(isset($left_nav['items'])): if(is_array($left_nav['items']) || $left_nav['items'] instanceof \think\Collection || $left_nav['items'] instanceof \think\Paginator): $i = 0; $__LIST__ = $left_nav['items'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$map_nav): $mod = ($i % 2 );++$i;?>
	       <dd class="<?php if(in_array($map_nav['menuid'], $__ADMIN_PANEL__['ids'])): ?>selected<?php endif; ?>"><a href="javascript:void(0);" data-param="<?php echo $map_nav['url']; ?>" data-menuid="<?php echo $map_nav['menuid']; ?>"><?php echo $map_nav['title']; ?></a><i class="icon iconfont icon-dagou"></i></dd>
	<?php endforeach; endif; else: echo "" ;endif; endif; ?>
	       </dl>
	<?php endforeach; endif; else: echo "" ;endif; endif; ?>
	</div>
	<?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
</div>
<!--顶部导航 START-->
<div class="admincp-header">
  <div id="foldSidebar"><i class="icon iconfont icon-icon-indent itip"  alt="展开/收起侧边导航"></i></div>
  <div class="admincp-name">
    <h2>Yzncms v1.0<br>平台系统管理中心</h2>
  </div>
  <div class="nc-module-menu">
    <ul class="nc-row">
      <?php if(is_array($__MENU__) || $__MENU__ instanceof \think\Collection || $__MENU__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__MENU__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
          <li data-param="<?php echo $key; ?>" class=""><a href="javascript:void(0);"><?php echo $menu['title']; ?></a></li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <div class="admincp-header-r">
    <div class="manager">
      <dl>
        <dt class="name"><?php echo $userInfo['username']; ?></dt>
        <dd class="group"><?php echo $role_name; ?></dd>
      </dl>
      <span class="avatar">
      <input name="_pic" type="file" class="admin-avatar-file itip" id="_pic" alt="设置管理员头像"/>
      <img alt="" nctype="admin_avatar" src="__STATIC__/admin/images/login/admin.png"> </span><i class="arrow itip" id="admin-manager-btn" alt="显示快捷管理菜单"></i>
      <div class="manager-menu">
        <div class="title">
          <h4>上次登录</h4>
          <a href="javascript:void(0);" onclick="Modifypw()"  class="edit-password">修改密码</a>
          </div>
        <div class="login-date">
        <?php if($userInfo['last_login_time'] > 0) { echo date('Y-m-d H:i:s',$userInfo['last_login_time']);} else { echo '--';}?>
          <span>(IP:
        <?php if (!empty($userInfo['last_login_ip'])) { echo long2ip($userInfo['last_login_ip']);} else { echo '--';}?>)</span> </div>
        <div class="title">
          <h4>常用操作</h4>
          <a href="javascript:void(0)" class="add-menu">添加菜单</a>
        </div>
        <ul class="nc-row" nctype="quick_link">
          <?php if(is_array($__ADMIN_PANEL__['main']) || $__ADMIN_PANEL__['main'] instanceof \think\Collection || $__ADMIN_PANEL__['main'] instanceof \think\Paginator): $i = 0; $__LIST__ = $__ADMIN_PANEL__['main'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$quick_menu): $mod = ($i % 2 );++$i;?>
            <li><a href="javascript:void(0);" onclick="openItem('<?php echo url($quick_menu['url'],array('menuid'=>$quick_menu['menuid'])); ?>')"><?php echo $quick_menu['name']; ?></a></li>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <ul class="operate nc-row">
      <li style="display: none !important;" nctype="pending_matters"><a class="toast show-option" href="javascript:void(0);"  title="查看待处理事项">&nbsp;<em>0</em></a></li>
      <li><a class="itip" href="https://www.kancloud.cn/ken678/yzncms/352683" alt="文档手册" target="_blank"><span class="icon iconfont icon-bangzhushouce"></span></a></li>
      <li><a class="sitemap show-option itip" nctype="map_on" href="javascript:void(0);" alt="查看全部管理菜单"><span class="icon iconfont icon-moxing"></span></a></li>
      <li><a class="homepage show-option itip"  onclick="go_home();" href="javascript:void(0);" alt="打开首页"><span class="icon iconfont icon-shouye"></span></a></li>
      <li><a class="show-option itip" data-param="1Admin|<?php echo url('cache/index'); ?>" id="deletecache" href="javascript:;" alt="缓存更新"><span class="icon iconfont icon-richangqingli"></span></a></li>
      <li><a class="login-out show-option itip" href="<?php echo url('index/logout'); ?>" alt="安全退出管理中心"><span class="icon iconfont icon-tuichu"></span></a></li>
    </ul>
  </div>
  <div class="clear"></div>
</div>
<!--顶部导航 END-->
<!--左侧菜单 及 右侧主内容 START-->
<div class="admincp-container unfold">
  <div class="admincp-container-left">
    <div class="top-border"><span class="nav-side"></span><span class="sub-side"></span></div>
    <?php if(!(empty($_extra_menu) || (($_extra_menu instanceof \think\Collection || $_extra_menu instanceof \think\Paginator ) && $_extra_menu->isEmpty()))): ?>

<?php echo extra_menu($_extra_menu,$__MENU__); endif; if(is_array($__MENU__) || $__MENU__ instanceof \think\Collection || $__MENU__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__MENU__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu_top): $mod = ($i % 2 );++$i;$key1=$key; ?>
<div id="admincpNavTabs_<?php echo $key; ?>" class="nav-tabs">
<?php if(!(empty($menu_top['items']) || (($menu_top['items'] instanceof \think\Collection || $menu_top['items'] instanceof \think\Paginator ) && $menu_top['items']->isEmpty()))): if(is_array($menu_top['items']) || $menu_top['items'] instanceof \think\Collection || $menu_top['items'] instanceof \think\Paginator): $k1 = 0; $__LIST__ = $menu_top['items'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu_center): $mod = ($k1 % 2 );++$k1;?>
<dl>
<dt><a href="javascript:void(0);"><span class="<?php echo $menu_center['icon']; ?>"></span><h3><?php echo $menu_center['title']; ?></h3></a></dt>
<dd class="sub-menu">
<ul>
<?php if(!(empty($menu_center['items']) || (($menu_center['items'] instanceof \think\Collection || $menu_center['items'] instanceof \think\Paginator ) && $menu_center['items']->isEmpty()))): if(is_array($menu_center['items']) || $menu_center['items'] instanceof \think\Collection || $menu_center['items'] instanceof \think\Paginator): if( count($menu_center['items'])==0 ) : echo "" ;else: foreach($menu_center['items'] as $key=>$menu_bottom): ?>
<li ><a href="javascript:void(0);" data-param="<?php echo $key1; ?>|<?php echo $menu_bottom['url']; ?>" data-id="<?php echo $menu_bottom['id']; ?>"><?php echo $menu_bottom['title']; ?></a></li>
<?php endforeach; endif; else: echo "" ;endif; endif; ?>
</ul>
</dd>
</dl>
<?php endforeach; endif; else: echo "" ;endif; endif; ?>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="about" title="关于系统" onclick="OpenAbout()"><i class="fa fa-copyright"></i><span>Yzncms v1.0</span></div>
  </div>
  <div class="admincp-container-right">
    <div class="top-border"></div>
    <iframe src="<?php echo url('admin/main/index'); ?>" id="workspace" name="workspace" style="overflow: visible;" frameborder="0" width="100%" height="94%" scrolling="yes" onload="window.parent"></iframe>
  </div>
</div>
<!--左侧菜单 及 右侧主内容 END-->
<script>
$("#deletecache").on('click',function(e){
    openItem($(this).attr('data-param'));
    /*iframeJudge({
        elem: $(this),
        href: "<?php echo url('index/cache'); ?>",
        id: "deletecache"
    });*/
});
function OpenAbout(){
  layer.open({
    type: 1
    ,title: false //不显示标题栏
    ,closeBtn: false
    ,area: '300px;'
    ,shade: 0.8
    ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
    ,resize: false
    ,btn: ['给我一颗星', '残忍拒绝']
    ,btnAlign: 'c'
    ,moveType: 1 //拖拽模式，0或者1
    ,content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">Yzncms(又名御宅男cms)是完全开源的项目，基于ThinkPHP5.09最新版,框架易于功能扩展，代码维护，方便二次开发,帮助开发者简单高效降低二次开发成本，满足专注业务深度开发的需求。</div>'
    ,success: function(layero){
      var btn = layero.find('.layui-layer-btn');
      btn.find('.layui-layer-btn0').attr({
        href: 'https://git.oschina.net/ken678/YZNCMS/tree/master'
        ,target: '_blank'
      });
    }
  });
};

function Modifypw(){
  $.get('<?php echo url("manager/modifypw"); ?>', {}, function(str){
    layer.open({
      title:'修改密码',
      area: ['480px', '300px'],
      type: 1,
      content: str
    });
  });
};
function go_home() {
  window.open("<?php echo url('/'); ?>");
}
</script>
</body>
</html>