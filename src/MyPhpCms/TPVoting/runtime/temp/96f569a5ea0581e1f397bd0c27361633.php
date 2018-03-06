<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:98:"G:\xampp\htdocs\MyProject\src\MyPhpCms\TPVoting\public/../application/admin\view\user\profile.html";i:1519802320;s:82:"G:\xampp\htdocs\MyProject\src\MyPhpCms\TPVoting\application\admin\view\layout.html";i:1520265491;}*/ ?>
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
                    <div class="layui-row">
    <div class="layui-col-md6 layui-col-md-offset1">
        <form class="layui-form">
            <div class="layui-form-item">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-block">
                    <input type="text" name="username" placeholder="用户名" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">邮箱</label>
                <div class="layui-input-block">
                    <input type="text" name="email" placeholder="邮箱" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">手机号码</label>
                <div class="layui-input-block">
                    <input type="text" name="phone" placeholder="手机号码" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">头像</label>
                <div class="layui-input-block">
                    <div class="coms-zoom-img">
                        <div class="no-pic" id="J_no-pic"></div>
                        <ul class="upload-img">
                            <li>
                                <div class="img-wrap">
                                    <img src="../static/admin/demo/demo1.jpg" />
                                </div>
                            </li>
                        </ul>
                        <div id="J_uploader-list" class="clearfix">
                        </div>
                        <div id="filePicker" class="filepicker-container"></div>
                        <div class="uploader-server">从服务器端选择</div>
                        <input type="hidden" name="thumbnail" id="J_thumbnail-ipt">
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">职业</label>
                <div class="layui-input-block">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">性别</label>
                <div class="layui-input-block">
                    <input type="radio" name="sex" value="男" title="男" checked="" />
                    <input type="radio" name="sex" value="女" title="女" />
                    <input type="radio" name="sex" value="保密" title="保密" />
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">出生日期</label>
                <div class="layui-input-block">
                    <input type="text" name="birthdate" id="birthdate" lay-verify="birthdate" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
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


$(function() {

    var fileCount = 0;
    var fileSize = 0;


    var $noPicBox = $("#J_no-pic");
    var $uploaderList = $('<ul class="upload-img"></ul>');
    $uploaderList.appendTo($("#J_uploader-list"));

    var $thumbNailIpt = $("#J_thumbnail-ipt");


    var uploader = WebUploader.create({
        pick: {
            id: '#filePicker',
            label: '点击上传本地图片'
        },
        formData: {

        },
        accept: { // 只允许选择图片文件格式
            title: 'Images',
            extensions: 'gif,jpg,bmp,png',
            mimeTypes: 'image/jpg,image/jpeg,image/png'
        },
        server: './js/fileupload2.php',
        swf: '/MyProject/src/MyPhpCms/TPVoting/public/static/admin/js/webuploader/Uploader.swf',
        //限制文件的大小
        fileSingleSizeLimit: 10 * 1024 * 1024,
        fileNumLimit: 5,
        fileSizeLimit: 10 * 1024 * 1024
    });

    uploader.onError = function(code) {
        //如果上传同一张图片，那么就会报错！！
        switch (code) {
            case "F_EXCEED_SIZE":
                layer.msg("单个文件大小不能超过2M");
                break;
            case "Q_EXCEED_SIZE_LIMIT":
                layer.msg("总文件大小不能超过4M");
                break;
            case "Q_TYPE_DENIED":
                layer.msg("请上传JPG、PNG、GIF、BMP格式文件");
                break;
            case "F_DUPLICATE":
                layer.msg("不能重复上传文件！");
                break;
            case "Q_EXCEED_NUM_LIMIT":
                layer.msg("单次上传文件总个数不能超过3个！");
                break;
            default:
                layer.msg("上传文件错误！");
        }
    };
    uploader.on("beforeFileQueued", function(file) {
        console.group("触发了：beforeFileQueued事件(某个文件开始上传前触发，一个文件只会触发一次)");
        //避免重复错误提示
        //
        //如果只要上插一张图片，那么点击上插按钮的时候就要删除之前的未上传的队列文件()
        var files = uploader.getFiles();
        $.each(files, function(key, val) {
            uploader.removeFile(val, true);
        });
        // fileCount=0;

        // console.dir(files)

    });
    uploader.on('fileQueued', function(file) {
        console.group("触发了：fileQueued事件(某个文件开始上传前触发，一个文件只会触发一次)");

        $uploaderList.children().remove();
        $noPicBox.hide();
        addFile(file);


        var allFiles = uploader.getFiles();
        // console.dir(initedFiles);
        // console.dir(allFiles);
    });

    uploader.on("uploadProgress", function(file, percentage) {
        console.group("触发了：uploadProgress事件(某个文件开始上传前触发，一个文件只会触发一次)");
        var $li = $('#' + file.id);
        var $percent = $li.find(".progress span");
        $percent.css('width', percentage * 100 + '%');
        console.dir(percentage);

    });

    uploader.on("uploadSuccess", function(file, response) {
        console.group("触发了：uploadSuccess");
        console.dir(response);
        $thumbNailIpt.val(response.filePath);


    });

    uploader.on("fileDequeued", function(file) {
        console.group("触发了：fileDequeued");
        $uploaderList.children().remove();
        $noPicBox.show();
        $(".webuploader-pick").text("点击上传本地图片");


    });


    function showError($elem, code) {
        var text;
        switch (code) {
            case 'exceed_size':
                text = '文件大小超出';
                break;
            case 'interrupt':
                text = '上传暂停';
                break;

            default:
                text = '上传失败，请重试';
                break;
        }
        $elem.text(text);
    };

    function addFile(file) {
        var $li = $('<li id="' + file.id + '">' +
            '<div class="img-wrap preview"></div>' +
            '<div class="handle-bar">' +
            '<span class="upload-btn">上传</span>' +
            '<span class="del-btn">删除</span>' +
            '</div>' +
            '<div class="progress"><span></span></div>' +
            '<div class="error"></div>' +
            '<div class="success"></div>' +
            '</li>');
        $li.appendTo($uploaderList);

        var $imgWrap = $li.find(".img-wrap");
        var $progress = $li.find(".progress");
        var $error = $li.find(".error");
        var $success = $li.find(".success");
        var $handleBar = $li.find(".handle-bar");
        var $uploadBtn = $li.find(".upload-btn");
        var $delBtn = $li.find(".del-btn");
        var fileState = uploader.getStats();

        $imgWrap.text("预览中...");

        uploader.makeThumb(file, function(error, src) {
            if (error) {
                showError($error, error);
                return false;
            }
            $imgWrap.text("").removeClass("preview");
            $('<img src="' + src + '" />').appendTo($imgWrap);
        });
        //图片已经生成预览
        file.on('statuschange', function(cur, prev) {

            if (cur == "invalid" || cur == "error") {
                showError($error);
            } else if (cur == 'interrupt') {
                showError($error, 'interrupt');
            } else if (cur == "progress") {
                $progress.show();
            } else if (cur == "complete") {
                $progress.hide().find("span").width(0);
                $handleBar.hide();
                $success.show();
                $(".webuploader-pick").text("重新上传图片")
            } else if (cur == "cancelled") {

            }
        });
        $uploadBtn.on("click", function() {
            uploader.upload();
        });



        $delBtn.on("click", function() {
            uploader.removeFile(file);
        });
    }
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