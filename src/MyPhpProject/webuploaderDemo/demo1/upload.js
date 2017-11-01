$(function() {
    // 添加的文件数量
    var fileCount = 0;

    // 添加的文件总大小
    var fileSize = 0;

    var $uploaderDefaultContainer = $(".uploader-default-container");
    var $statusBar = $("#J_statusBar");
    var $queueList = $('#J_queue-list');

    var $upload = $("#J_uploadBtn");
    var $filePicker2 = $('#filePicker2');
    var $info = $("#J_info");
    var $progress = $("#J_statusBar-progress")
    //

    var percentages = {};
    var state = 'pedding';




    var uploader = WebUploader.create({
        pick: {
            id: '#filePicker',
            label: '点击选择图片'
        },
        formData: {
            uid: 123
        },
        server: '../server/fileupload.php',
        swf: '../../dist/Uploader.swf',
        fileSizeLimit: 200 * 1024 * 1024
    });
    uploader.onError = function(code) {
        //如果上传同一张图片，那么就会报错！！
        alert('Eroor: ' + code);
    };

    uploader.addButton({
        id: '#filePicker2',
        label: '继续添加'
    });

    uploader.on('ready', function() {
        window.uploader = uploader;
    });


    uploader.on('dialogOpen', function() {
        console.dir("触发了：dialogOpen(本地上传窗口打开的时候)");
    });

    uploader.on("beforeFileQueued", function(file) {
        console.group("触发了：beforeFileQueued事件(当文件被加入队列之前触发)");
    });
    uploader.on("fileQueued", function(file) {
        console.group("触发了：fileQueued事件(当文件被加入队列以后触发)");
        fileCount++;
        fileSize += file.size;

        if (fileCount >= 1) {
            //如果有上传的图片，那么默认的框就要隐藏掉,
            //此时，文件被加入队列，这个时候就要显示出来，创建views展示城
            $uploaderDefaultContainer.hide();
            $statusBar.show();
            addFile(file);
            setState('ready');
            updateTotalText();
        }

    });

    uploader.on("filesQueued", function(file) {
        console.group("触发了：filesQueued事件(当一批文件添加进队列以后触发)");
    });

    uploader.on("uploadStart", function(file) {
        console.group("触发了：uploadStart事件(某个文件开始上传前触发，一个文件只会触发一次)");
    });

    uploader.on("uploadProgress", function(file, percentage) {
        console.group("触发了：uploadProgress事件(某个文件开始上传前触发，一个文件只会触发一次)");
        var $li = $('#' + file.id);
        var $percent = $li.find(".progress span");
        console.log(percentage);
        $percent.css('width', percentage * 100 + '%');
    });

    uploader.on("uploadSuccess", function(file, response) {

        console.dir(response);
    });


    uploader.on('all', function(type) {
        var stats;
        console.dir(type)
        switch (type) {
            //如果startUpload，那么这个时候设置state 为uploading
            case 'startUpload':
                setState('uploading');
                break;
            case 'uploadFinished':
                    setState( 'finshed' );
                    break;
            case 'uploadSuccess':
                setState('uploadSuccess');
                break;
        }
    });


    function addFile(file) {
        var $li = $('<li id="' + file.id + '">' +
            '<p class="imgWrap"></p>' +
            '<p class="progress"><span></span></p>' +
            '<p class="title">' + file.name + '</p>' +
            '</li>');

        //获取图片容器
        var $wrap = $li.find('p.imgWrap');
        var $prgress = $li.find('p.progress span');   

        var showError = function(code) {
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

            $info.text(text).appendTo($li);
        };

        if (file.getStatus() === 'invalid') {
            showError(file.statusText);
        } else {
            $wrap.text('预览中');
            uploader.makeThumb(file, function(error, src) {
                var img;
                if (error) {
                    $wrap.text('不能预览');
                    return;
                }
                img = $('<img src="' + src + '">');
                $wrap.empty().append(img);
                percentages[file.id] = [file.size, 0];
                file.rotation = 0;
            });

            file.on('statuschange', function( cur, prev ){
                if ( cur === 'error' || cur === 'invalid' ) {
                    showError( file.statusText );
                    percentages[ file.id ][ 1 ] = 1;
                }else if ( cur === 'interrupt' ) {
                    showError( 'interrupt' );
                }else if ( cur === 'queued' ) {
                     $info.remove();
                     percentages[ file.id ][ 1 ] = 0;
                } else if ( cur === 'progress' ) {
                     $info.remove();
                 }else if ( cur === 'complete' ) {
                    $prgress.hide().width(0);
                    $li.append( '<span class="success"></span>' );
                 }
            })
        }


        $queueList.show().append($li);
    }

    function setState(val) {
        var file, stats;
        if (val === state) {
            return;
        }
        state = val;
        switch (state) {
            case 'pedding':
                $uploaderDefaultContainer.show();
                $queueList.hide();
                $statusBar.hide();
                // uploader.refresh();
                break;
            case 'ready':
                $uploaderDefaultContainer.hide();
                $filePicker2.show();
                $statusBar.show();
                $queueList.show();
                // uploader.refresh();
                break;

            case 'uploading':
                $filePicker2.hide();
                $progress.show();
                $upload.text('暂停上传');
                break;
            
            case 'paused':
            case 'confirm':
            case 'finshed':
                alert("finish");
        }
    }

    function updateTotalText() {
        var text = '',
            stats;
        if (state === "ready") {
            text = "选中" + fileCount + '张图片,共' + WebUploader.formatSize(fileSize) + '。';
        } else {

        }
        $info.html(text);
    }

    function updateTotalProgress() {

    }
    $upload.on("click", function() {
        if ($(this).hasClass('disabled')) {
            return false;
        }
        if ( state === 'ready' ) {
            uploader.upload();
        } else if ( state === 'paused' ) {
            uploader.upload();
        } else if ( state === 'uploading' ) {
            uploader.stop();
        }

    })


})