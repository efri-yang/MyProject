<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:97:"G:\xampp\htdocs\MyProject\src\MyPhpCms\TPVoting\public/../application/admin\view\index\index.html";i:1520254028;s:82:"G:\xampp\htdocs\MyProject\src\MyPhpCms\TPVoting\application\admin\view\layout.html";i:1522221703;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="/MyProject/src/MyPhpCms/TPVoting/public/static/admin/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="/MyProject/src/MyPhpCms/TPVoting/public/static/admin/css/base.css">
    <script type="text/javascript" src="/MyProject/src/MyPhpCms/TPVoting/public/static/admin/js/jquery/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="/MyProject/src/MyPhpCms/TPVoting/public/static/admin/layui/layui.js"></script>
    <link rel="stylesheet" type="text/css" href="/MyProject/src/MyPhpCms/TPVoting/public/static/admin/css/admin.css">
</head>

<body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <div class="layui-logo">管理后台</div>
            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item">
                    <a href="javascript:;">
                  <img src="/MyProject/src/MyPhpCms/TPVoting/public/uploads/admin/avatar/<?php echo $web_data['user_info']['avatar']; ?>" class="layui-nav-img">
                  <?php echo $web_data["user_info"]["username"]; ?>
                </a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('user/profile'); ?>">基本资料</a></dd>
                    </dl>
                        <!-- <dd><a href="<?php echo url('user/profile',['id'=>$web_data['user_info']['id']]); ?>">基本资料</a></dd>
                    </dl> -->
                </li>
                <li class="layui-nav-item"><a href="<?php echo url('login/logout'); ?>">退了</a></li>
            </ul>
        </div>
        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航）-->
                <ul class="sidebar-menu">
                    <?php echo $web_data["left_menu"]; ?>
                </ul>  
            </div>
        </div>

        <div class="layui-body">
            <div class="content-container">
                <div class="content-header clearfix">
                    <h1 class="tit"><?php echo $web_data["web_title"]; ?></h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo url('admin/index/index'); ?>">首页</a> </li>
                        <?php echo $web_data["web_breadcrumb"]; ?>
                    </ol>
                </div>

                <div class="content-main">
                    <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	地方撒打发斯蒂芬
</body>
</html>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    layui.use('element', function() {
        var element = layui.element;
    });

   

        $(function(){
            $(".treeview > a").on("click",function(){
                var $this=$(this);
                var $treeviewMenu=$this.siblings('.treeview-menu');
                if($treeviewMenu.is(":visible")){
                   $treeviewMenu.slideUp();
                }else{
                   $treeviewMenu.slideDown()
                }
            })
        })
    
    </script>
</body>
</html>