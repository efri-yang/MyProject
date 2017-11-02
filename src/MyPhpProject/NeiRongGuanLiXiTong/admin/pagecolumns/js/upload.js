$(function() {
    // 添加的文件数量
    var fileCount = 0;

    // 添加的文件总大小
    var fileSize = 0;
    var percentages = {};
    // 可能有pedding, ready, uploading, confirm, done.
    var state = 'pedding';



    var $uploaderDefaultContainer = $(".uploader-default-container");
    var $statusBar = $("#J_statusBar");
    var $queueList = $('#J_queue-list');

    var $upload = $("#J_uploadBtn");
    var $filePicker2 = $('#filePicker2');
    var $info = $("#J_info");
    //总体进度条
    var $progress = $("#J_statusBar-progress")
   
    
   


    //初始化
    var uploader = WebUploader.create({
        pick: {
            id: '#filePicker',
            label: '点击上传本地图片'
        },
        formData: {
            uid: 123
        },
        accept: {// 只允许选择图片文件格式
            title: 'Images',
            extensions: 'gif,jpg,bmp,png',
            mimeTypes: 'image/jpg,image/jpeg,image/png'
        },
        server: './fileupload.php',
        swf: '../../../staitc/js/webuploader/Uploader.swf',
        //限制文件的大小
        fileSingleSizeLimit:2 * 1024 * 1024,
        fileNumLimit:1,
        fileSizeLimit: 4 * 1024 * 1024
    });


    uploader.onError = function(code) {
        //如果上传同一张图片，那么就会报错！！
       switch(code){
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
            //添加文件到队列，然后展示预览图
            addFile(file);
            $upload.show();
            //设置状态告知现在可以上传了，通过这个状态去改变文本显示
            setState('ready');

            //更新状态条的文本
            updateTotalText(); 
        }

    });

    uploader.on("filesQueued", function(file) {
        
        console.group("触发了：filesQueued事件(当一批文件添加进队列以后触发)");
        console.dir(percentages);
    });

    uploader.on("uploadStart", function(file) {

        console.group("触发了：uploadStart事件(某个文件开始上传前触发，一个文件只会触发一次)");
    });

    uploader.on("uploadProgress", function(file, percentage) {
        console.group("触发了：uploadProgress事件(某个文件开始上传前触发，一个文件只会触发一次)");
        var $li = $('#' + file.id);
        var $percent = $li.find(".progress span");
        percentages[ file.id ][ 1 ] = percentage;
        $percent.css('width', percentage * 100 + '%');
        updateTotalProgress();
    });

    uploader.on("uploadAccept", function( file, data){
        console.group("触发了：uploadAccept事件");
        console.dir(data);
    })

    uploader.on("uploadSuccess", function(file, response) {
         console.group("触发了：uploadSuccess");
        
         $("#"+file.id).find(".file-panel").remove();
         $("#J_zoomurl").val(response.filePath);
    });


    


    function addFile(file) {
        var $li = $('<li id="' + file.id + '">' +
            '<p class="imgWrap"></p>' +
            '<p class="progress"><span></span></p>' +
            '<p class="title">' + file.name + '</p>' +
            '</li>');
        var $handle=$('<div class="file-panel"><span class="cancel">删除</span></div>');

        $handle.appendTo($li);
        //获取图片容器
        var $wrap = $li.find('p.imgWrap');
        var $prgress = $li.find('p.progress span'); 
        var $success=$('<span class="success"></span>');
        var $error = $('<span class="error"></span>');

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
            if($li.children('.error').length > 0){
                $li.children('.error').remove();
            }
            $error.text(text).appendTo($li);
        };

        //再次判断队列中的文件是否是合法的
        if (file.getStatus() === 'invalid') {
            showError(file.statusText);
        } else {
            $wrap.text('预览中');

            //生成缩略图
            uploader.makeThumb(file, function(error, src) {
                var img;
                if (error) {
                    $wrap.text('无法预览');
                    return;
                }
                img = $('<img src="' + src + '">');
                $wrap.empty().append(img);
                //{WU_FILE_0:[16887,0]}
                percentages[file.id] = [file.size, 0];
            });

            file.on('statuschange', function( cur, prev ){
                if ( cur === 'error' || cur === 'invalid' ) {
                    showError( file.statusText );
                    percentages[ file.id ][ 1 ] = 1;
                }else if ( cur === 'interrupt' ) {
                    showError( 'interrupt' );
                }else if ( cur === 'queued' ) {
                     percentages[ file.id ][ 1 ] = 0;
                } else if ( cur === 'progress' ) {
                    $prgress.show();
                    $li.find(".file-panel").hide();
                    $error.remove();
                }else if ( cur === 'complete' ) {
                    $prgress.hide().width(0);
                    $success.appendTo($li);
                }
            });

            $li.find(".cancel").on("click",function(){

                uploader.removeFile(file);

            })
        }
        $queueList.show().append($li);
    }

    uploader.on("fileDequeued",function(file){
         fileCount--;
            fileSize -= file.size;

            if ( !fileCount ) {
                setState( 'pedding' );
            }
            removeFile(file);
    })
    // uploader.onFileDequeued = function( file ) {
    //     alert("xxx")
    // }
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
                uploader.refresh();
                $upload.hide();
                break;
            case 'ready':
                $uploaderDefaultContainer.hide();
                $filePicker2.show();
                $statusBar.show();
                $queueList.show();
                $upload.show();
                uploader.refresh();
                
                break;

            case 'uploading':
                $filePicker2.hide();
                $progress.show();
                $upload.hide();
                $upload.addClass('paused').text('暂停上传');
                updateTotalProgress();
                break;
            case 'finshed':
                updateTotalText();
                $filePicker2.show();
                $progress.hide();
                $upload.hide();
               
                
        }
    }

    function removeFile( file ) {
            var $li = $('#'+file.id);

            delete percentages[ file.id ];
            $li.remove();
          
        }

    function updateTotalText() {
        var text = '',
            stats;
        if (state === "ready") {
            text = "选中" + fileCount + '张图片,共' + WebUploader.formatSize(fileSize) + '。';
        } else if(state==="finshed"){
            stats = uploader.getStats();
            if(stats.uploadFailNum){
                text="已成功上传"+stats.successNum+"张照片,"+stats.uploadFailNum+"张照片上传失败";
            }else{
                 text = "共" + fileCount + '张图片,已上传' + stats.successNum + '张图片('+WebUploader.formatSize(fileSize)+')，上传完毕。';
            }
        }
        $info.html(text);
    }

    function updateTotalProgress() {
         var loaded = 0,
                total = 0,
                spans = $progress.children(),
                percent;
            $.each( percentages, function( k, v ) {
                total += v[ 0 ];
                loaded += v[ 0 ] * v[ 1 ];
            } );
            percent = total ? loaded / total : 0;
            spans.eq( 0 ).text( Math.round( percent * 100 ) + '%' );
            spans.eq( 1 ).css( 'width', Math.round( percent * 100 ) + '%' );

    }

    uploader.on('all', function(type) {
        var stats;
        console.dir(type)
        switch (type) {
            //uploader.upload(); 后就会触发 startUpload
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
    $upload.on("click", function(event) {
        event.preventDefault();
        if ($(this).hasClass('disabled')) {
            return false;
        }
        if ( state === 'ready' ) {
            uploader.upload();
            //检测事件 all
        } else if ( state === 'paused' ) {
            uploader.upload();
        } else if ( state === 'uploading' ) {
            uploader.stop();
        }

    })


})