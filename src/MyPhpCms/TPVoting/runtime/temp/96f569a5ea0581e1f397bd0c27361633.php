<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:98:"G:\xampp\htdocs\MyProject\src\MyPhpCms\TPVoting\public/../application/admin\view\user\profile.html";i:1520329138;s:82:"G:\xampp\htdocs\MyProject\src\MyPhpCms\TPVoting\application\admin\view\layout.html";i:1520304695;}*/ ?>
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
                    <div class="layui-row mt20">
    <div class="layui-col-md6 layui-col-md-offset1">
        <form class="layui-form" action="<?php echo url('user/profile',['action'=>'edit']); ?>">
            <div class="layui-form-item">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-block">
                    <input type="text" name="username" placeholder="用户名" class="layui-input" value="<?php echo $web_data['user_info']['username']; ?>" disabled>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">邮箱</label>
                <div class="layui-input-block">
                    <input type="text" name="email" placeholder="邮箱" class="layui-input" value="<?php echo $web_data['user_info']['email']; ?>" disabled>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">手机号码</label>
                <div class="layui-input-block">
                    <input type="text" name="phone" placeholder="手机号码" class="layui-input" value="<?php echo $web_data['user_info']['phone']; ?>" disabled>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">头像</label>
                <div class="layui-input-block">
                    <div class="coms-zoom-img">
                       <!--  <div class="no-pic" id="J_no-pic"></div> -->
                        <ul class="upload-img">
                            <li>
                                <div class="img-wrap">
                                    <img src="/MyProject/src/MyPhpCms/TPVoting/public/uploads/admin/avatar/<?php echo $web_data['user_info']['avatar']; ?>" />
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--  <div class="layui-form-item">
                <label class="layui-form-label">职业</label>
                <div class="layui-input-block">
                </div>
            </div> -->
            <div class="layui-form-item">
                <label class="layui-form-label">性别</label>
                <div class="layui-input-block">
                    <input type="radio" name="sex" value="男" title="男" <?php echo $web_data[ 'user_info'][ 'sex']=='男'?'checked' : ''; ?> disabled />
                    <input type="radio" name="sex" value="女" title="女" <?php echo $web_data[ 'user_info'][ 'sex']=='女'?'checked' : ''; ?> disabled />
                    <input type="radio" name="sex" value="保密" title="保密" <?php echo $web_data[ 'user_info'][ 'sex']=='保密'?'checked' : ''; ?> disabled />
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">出生日期</label>
                <div class="layui-input-block">
                    <?php if(!!$web_data['user_info']['birthday']): ?>
                    <input type="text" name="birthdate" id="birthdate" lay-verify="birthdate" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input" value="<?php echo $web_data['user_info']['birthday']; ?>" disabled> <?php else: ?>
                    <input type="text" name="birthdate" id="birthdate" lay-verify="birthdate" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input" value=" " disabled> <?php endif; ?>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="demo1">修改</button>
                </div>
            </div>
        </form>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="/MyProject/src/MyPhpCms/TPVoting/public/static/admin/js/webuploader/webuploader.css" />
<script type="text/javascript" src="/MyProject/src/MyPhpCms/TPVoting/public/static/admin/js/webuploader/webuploader.js"></script>
<script type="text/javascript">
layui.use(["form", "laydate"], function() {
    var form = layui.form;
    var laydate = layui.laydate;
    laydate.render({
        elem: '#birthdate'
    });
})
</script>
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