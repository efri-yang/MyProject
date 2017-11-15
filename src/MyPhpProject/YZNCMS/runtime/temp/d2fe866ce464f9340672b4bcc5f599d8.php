<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:92:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/templates/default/content/index\index.html";i:1510727776;s:92:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/templates/default/content/public\base.html";i:1510727776;s:94:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/templates/default/content/public\header.html";i:1510727776;s:94:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/templates/default/content/public\footer.html";i:1510727776;}*/ ?>
<!doctype html>
<html class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?php if(isset($SEO['title']) && !empty($SEO['title'])): ?><?php echo $SEO['title']; endif; ?><?php echo $SEO['site_title']; ?></title>
<meta name="description" content="<?php echo $SEO['description']; ?>" />
<meta name="keywords" content="<?php echo $SEO['keyword']; ?>" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-title" content="" />
<link rel="stylesheet" href="__CSS_PATH__/main.css"/>
<!--[if lt IE 9]>
<script type="text/javascript" src="__STATIC__/js/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="__STATIC__/js/jquery-2.0.3.min.js"></script>
<!--<![endif]-->

</head>
<body>
<div class="top">
    <div class="w_1200">
        <div class="fl c-66 f12">欢迎访问御宅男工作室官网!</div>
        <?php if(is_login()): ?>
        <div class="fr f12 c-99 user-entry">
            您好,
            <span> <a href="<?php echo url('member/index/index'); ?>" class="c-99"><?php echo get_username(); ?></a></span>
            <span class="wr"><a href="<?php echo url('member/index/logout'); ?>" class="c-99">退出</a></span>
        </div>
        <?php else: ?>
        <div class="fr f12"><a class="c-99" href="<?php echo url('member/index/index'); ?>">登录/注册</a></div>
        <?php endif; ?>
    </div>
</div>
<div class="header">
    <div class="header-box clearfix">
        <a href="<?php echo url('/'); ?>"><img class="logo" src="__IMG_PATH__/logo.png" alt="" width="200"></a>
        <div class="header-nav">
            <ul>
                <li class="<?php if(empty($catid) || (($catid instanceof \think\Collection || $catid instanceof \think\Paginator ) && $catid->isEmpty())): ?> active<?php endif; ?>"><a href="/">首页</a></li>
                <?php $content_tag = new \app\content\taglib\Content;
 if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'0','cache'=>'3600','num'=>'6','order'=>'listorder ASC','return'=>'data','page'=>'0','pagefun'=>'page',)); } if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="<?php if(in_array($catid,explode( ',',$vo[ 'arrchildid']))): ?> active<?php endif; ?>"><a href="<?php echo $vo['url']; ?>"><?php echo $vo['catname']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                
            </ul>
        </div>
    </div>
</div>
<div class="bodyer">

<div class="main-pic">
    <div class="cover"></div>
    <div class="main-inner">
        <div style="position: relative;">
            <h1>YZN<font>CMS</font>内容管理系统</h1>
            <h2>基于ThinkPHP5.011最新版,框架易于功能扩展，代码维护，方便二次开发  
帮助开发者简单高效降低二次开发成本，满足专注业务深度开发的需求</h2>
            <div class="btns">
                <a href="https://git.oschina.net/ken678/YZNCMS" target="_blank" class="btn btn-introduce"><i class="iconfont"></i>源码下载</a>
                <a href="https://www.kancloud.cn/ken678/yzncms" target="_blank" class="btn btn-downcode"><i class="iconfont"></i>文档说明</a>
            </div>
            <div class="downcount">
                下载<em>1800+</em>次
            </div>
            <div class="joinus">
                <span>当前版本：V1.0 测试版</span>
            </div>
        </div>
    </div>
</div>
<div style="min-height: 200px;">
    
</div>

</div>
<?php echo hook('pageFooter'); ?>
<div class="clear"></div>
<div class="footer">
    <div class="bar">
    <div class="w_1200">
        <div class="row">
            <div class="bar_left">御宅男工作室专注互联网技术定制开发！</div>
            <div class="bar_right">
                <a href="javascript:;" class="xq1" target="_blank" rel="nofollow">在线咨询</a>
                <a href="javascript:;" class="xq2" target="_blank" rel="nofollow">QQ咨询</a>
            </div>
        </div>
    </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-websites-box">
            <div class="content-wrapper">
                <div class="footer-city-list">
                    <a rel="nofollow" href="" target="_blank">友链合作&gt;</a>
                    <span class="on">友情链接</span>
                </div>
                <div class="footer-websites">
                    <ul class="clearfix">
                        <?php $cache = 3600; $cacheID = to_guid_string(array()); if( 3600 && $_return = cache( $cacheID ) ){       $data=$_return; }else{  $get_db = think\Db::name(ucwords("links")); $get_db->order("listorder ASC"); $data=$get_db->where(array())->limit(20)->select(); if(3600){ cache( $cacheID  ,$data,$cache); }; }  if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li><a href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['name']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-company-box">
            <div class="content-wrapper">
                <div class="footer-qr-code">
                    <div class="footer-app-code">
                        <img class="lazy" src="__IMG_PATH__/qrcode_wx.jpg" style="display: inline;">
                        <p>微信扫一扫</p>
                    </div>
                    <div class="footer-weixin-code">
                        <img class="lazy" src="__IMG_PATH__/qrcode_wb.jpg" style="display: inline;">
                        <p>关注新浪微博</p>
                    </div>
                </div>
                <div class="footer-company-info">
                    <ul>
                        <?php $content_tag = new \app\content\taglib\Content;
 if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'5','cache'=>'3600','num'=>'6','order'=>'listorder ASC','return'=>'data','page'=>'0','pagefun'=>'page',)); } if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li><a href="<?php echo $vo['url']; ?>"  rel="nofollow"><?php echo $vo['catname']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        
                    </ul>
                    <p class="footer-company-state">
                        免责声明：本站资源全来源于网络,不承担任何版权问题,如果我们侵犯了您的权益,请来信告知,我们会在第一时间处理！
                        <br>© 2017 御宅男工作室 版权所有
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 用于加载js代码 -->
<div class="hidden">
	<!-- 用于加载统计代码等隐藏元素 -->
</div>
</body>
</html>
