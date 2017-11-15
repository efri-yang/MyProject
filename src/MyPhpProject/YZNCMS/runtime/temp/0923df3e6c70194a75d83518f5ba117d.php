<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"G:\xampp\htdocs\MyProject\src\MyPhpProject\YZNCMS/apps/admin\view\main\index.html";i:1510727775;}*/ ?>
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
<link href="__STATIC__/admin/css/index.css" rel="stylesheet" type="text/css">
<link href="__STATIC__/admin/font/css/iconfont.css" rel="stylesheet" />
</head>
<body class="iframe_body">
<div class="warpper">
    <div class="title">管理中心</div>
    <div class="content start_content">
        <div class="contentWarp">
            <div class="contentWarp_item clearfix">
                <div class="section_order_select">
                        <ul>
                            <li>
                                <a style="cursor: default;">
                                    <i class="ice ice_w icon iconfont icon-neirongguanli pet_nav_lanmu"></i>
                                    <div class="t">栏目数量</div>
                                    <span class="number">0</span>
                                </a>
                            </li>
                            <li>
                                <a style="cursor: default;">
                                    <i class="ice ice_w icon iconfont icon-moxing pet_nav_moxing"></i>
                                    <div class="t">模型数量</div>
                                    <span class="number">0</span>
                                </a>
                            </li>
                            <li>
                                <a style="cursor: default;">
                                    <i class="ice ice_w icon iconfont icon-danye pet_nav_wenzhang"></i>
                                    <div class="t">文章数量</div>
                                    <span class="number">0</span>
                                </a>
                            </li>
                            <li>
                                <a style="cursor: default;">
                                    <i class="ice ice_w icon iconfont icon-chengyuan pet_nav_huiyuan"></i>
                                    <div class="t">会员总数</div>
                                    <span class="number">0</span>
                                </a>
                            </li>
                        </ul>
                </div>
                <div class="clear"></div>
                <div class="section section_order_count" style="float: none;width: inherit;">
                    <div class="system_section_con">
                        <div class="sc_title">
                            <i class="sc_icon pet_nav_banben iconfont icon-banben"></i>
                            <h3>版本系统</h3>
                        </div>
                        <div class="sc_warp" id="system_warp" style="display: block;padding-bottom: 20px;">
                            <table cellpadding="0" cellspacing="0" class="system_table">
                                <tbody><tr>
                                    <td class="gray_bg">程序版本:</td>
                                    <td>Yzncms V1.0.0</td>
                                    <td class="gray_bg">更新时间:</td>
                                    <td>2017-08-15</td>
                                </tr>
                                <tr>
                                    <td class="gray_bg">程序开发:</td>
                                    <td>御宅男（QQ:530765310）</td>
                                    <td class="gray_bg">版权所有:</td>
                                    <td>御宅男工作室</td>
                                </tr>
                                </tbody></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--切割线-->
        <div class="contentWarp">
            <div class="section system_section" style="float: none;width: inherit;">
                <div class="system_section_con">
                    <div class="sc_title">
                        <i class="sc_icon pet_nav_xinxi iconfont icon-shezhi"></i>
                        <h3>系统信息</h3>
                    </div>
                    <div class="sc_warp" id="system_warp" style="display: block;padding-bottom: 20px;">
                        <table cellpadding="0" cellspacing="0" class="system_table">
                            <tbody><tr>
                                <td class="gray_bg">服务器操作系统:</td>
                                <td><?php echo $sys_info['os']; ?></td>
                                <td class="gray_bg">服务器域名/IP:</td>
                                <td><?php echo $sys_info['domain']; ?> [ <?php echo $sys_info['ip']; ?> ]</td>
                            </tr>
                            <tr>
                                <td class="gray_bg">服务器环境:</td>
                                <td><?php echo $sys_info['web_server']; ?></td>
                                <td class="gray_bg">PHP 版本:</td>
                                <td><?php echo $sys_info['phpv']; ?></td>
                            </tr>
                            <tr>
                                <td class="gray_bg">Mysql 版本:</td>
                                <td><?php echo $sys_info['mysql_version']; ?></td>
                                <td class="gray_bg">GD 版本:</td>
                                <td><?php echo $sys_info['gdinfo']; ?></td>
                            </tr>
                            <tr>
                                <td class="gray_bg">文件上传限制:</td>
                                <td><?php echo $sys_info['fileupload']; ?></td>
                                <td class="gray_bg">最大占用内存:</td>
                                <td><?php echo $sys_info['memory_limit']; ?></td>
                            </tr>
                            <tr>
                                <td class="gray_bg">最大执行时间:</td>
                                <td><?php echo $sys_info['max_ex_time']; ?></td>
                                <td class="gray_bg">安全模式:</td>
                                <td><?php echo $sys_info['safe_mode']; ?></td>
                            </tr>
                            <tr>
                                <td class="gray_bg">Zlib支持:</td>
                                <td><?php echo $sys_info['zlib']; ?></td>
                                <td class="gray_bg">Curl支持:</td>
                                <td><?php echo $sys_info['curl']; ?></td>
                            </tr>
                            <tr>
                                <td class="gray_bg">北京时间:</td>
                                <td><?php echo $sys_info['beijing_time']; ?></td>
                                <td class="gray_bg">服务器时间:</td>
                                <td><?php echo $sys_info['time']; ?></td>
                            </tr>
                            <tr>
                                <td class="gray_bg">网站目录:</td>
                                <td><?php echo $sys_info['web_directory']; ?></td>
                                <td class="gray_bg">THINK版本:</td>
                                <td><?php echo $sys_info['think_version']; ?></td>
                            </tr>
                            <tr>
                                <td class="gray_bg">剩余空间:</td>
                                <td><?php echo $sys_info['remaining_space']; ?></td>
                                <td class="gray_bg">用户IP:</td>
                                <td><?php echo $sys_info['user_ip']; ?></td>
                            </tr>
                            </tbody></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <p>版权所有 © 2017 Yzncms All Rights Reserved</p>
</div>
</body>
</html>