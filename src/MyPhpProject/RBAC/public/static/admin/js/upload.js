(function($) {
    $(function() {

        var $elemNoPic=$("#J_no-pic"),
            $elemUploaderList=$("#J_uploader-list"),
            $elemAvatarfile=$("#J_avatarfile");


        if(!!$elemAvatarfile.val()){
            var avatarOldFile=static_path+$elemAvatarfile.val();
            
        }

        

        function renderItem(file){
            var str='<li id="'+file.id+'">'
                        +'<div class="img-wrap preview">预览中...</div>'
                        +'<div class="handle-bar">'
                            +'<span class="upload-btn">上传</span>'
                            +'<span class="del-btn">删除</span>'
                        +'</div>'
                        +'<div class="progressing">'
                            +'<span></span>'
                        +'</div>'
                        +'<div class="error">上传失败了</div>'
                        +'<div class="success"></div>'
                    +"</li>";
            $li=$(str);
            $li.appendTo($elemUploaderList);
            return $li;

        }


        var uploader = WebUploader.create({
            pick: {
                id: '#filePicker',
                label: '点击上传本地头像'
            },
            formData: {
                
            },
            accept: { // 只允许选择图片文件格式
                title: 'Images',
                extensions: 'gif,jpg,bmp,png',
                mimeTypes: 'image/jpg,image/jpeg,image/png'
            },
            server: './singleUpload.php',
            //限制文件的大小
            fileSingleSizeLimit:2 * 1024 * 1024,
            fileNumLimit:1,
            fileSizeLimit: 4 * 1024 * 1024
        });

        uploader.on('ready', function() {
            window.uploader = uploader;
        });
        console.dir(uploader);
        uploader.on("beforeFileQueued",function(file){
            console.group("触发了：beforeFileQueued——事件(某个文件开始上传前触发，一个文件只会触发一次)");
            var files=uploader.getFiles();
            for(i=0;i<files.length;i++){
                uploader.removeFile(files[i],true);
                $('#' + files[i].id).remove();
            }
            $elemUploaderList.html("");
        	

        });
        uploader.on("fileQueued",function(file){
            console.group("触发了：fileQueued——事件(当文件被加入队列以后触发)");
            console.group(file);


            $elemNoPic.hide();
            $elemUploaderList.show();



            uploader.makeThumb(file,function(error,src){
                var $li=renderItem(file);
                var $imgWrap=$li.find(".img-wrap"),
                    $handlerBar=$li.find(".handle-bar"),
                    $uploadBtn=$li.find(".upload-btn"),
                    $delBtn=$li.find(".del-btn");
                    

                $imgWrap.html('<img src="'+src+'" />');
                $handlerBar.show();

                $uploadBtn.on("click",function(){
                    uploader.upload();
                });


                $delBtn.on("click",function(){
                    var id=$(this).parent().parent().attr("id");
                    uploader.removeFile(id,true);
                    $li.remove(); 
                    if(!!avatarOldFile){
                        $('<li><div class="img-wrap"><img src="'+avatarOldFile+'" /></div></li>').appendTo($elemUploaderList);
                    }
                })


            })


            
        });
        uploader.on("filesQueued",function(file){
            //每次上传的时候，返回上传成功的文件数组
            console.group("触发了：filesQueued——事件(当一批文件添加进队列以后触发)");
            
        });

        uploader.on("fileDequeued",function(file){
                console.group("触发了：fileDequeued——事件(当文件被移除队列后触发)");
                var len=uploader.getFiles("inited").length;
                if(!len && !avatarOldFile){
                    $elemNoPic.show();
                }
        });

        uploader.on("startUpload",function(file){
            console.group("触发了：startUpload——事件");
        });

        uploader.on("uploadBeforeSend",function(object){
            console.group("触发了：uploadBeforeSend——事件");
             var $li = $('#' + object.file.id);
             $li.find(".del-btn").hide();
           
        });

        uploader.on("uploadProgress", function(file, percentage) {
            console.group("触发了：uploadProgress——事件");
            console.log(percentage);

            var $li = $('#' + file.id);
            $progress=$li.find(".progressing");
            $progress.show();
            $progress.children('span').css('width', percentage * 100 + '%');
        })

        uploader.on("uploadSuccess",function(file,response){
                console.group("触发了：uploadSuccess——事件");
                var $li = $('#' + file.id);
                
                
                if(!!response){
                    $li.find(".success").show();
                    $elemAvatarfile.val(response.url);
                }else{
                    $li.find(".error").show();
                }

                
        });

        //先执行uploadSuccess  然后在执行uploadComplete
        uploader.on("uploadComplete",function(file){
            console.group("触发了：uploadComplete——事件");
            var $li = $('#' + file.id);
            var $progress=$li.find(".progressing");
            $li.find(".handle-bar").hide();
            $progress.hide();
            $progress.children('span').css('width',0);
                
        });



        uploader.on("error",function(type){
            console.dir(type);
            console.group("触发了：error——事件()");
            switch(type){
                case "Q_EXCEED_NUM_LIMIT":
                    layer.msg('最多只能上传'+uploader.options.fileNumLimit+'个文件！');
                    break;
                case "F_EXCEED_SIZE":
                    layer.msg("上传单个文件大小不能超过"+uploader.options.fileSingleSizeLimit/1024/1024+"M");
                    break;
                case "Q_EXCEED_SIZE_LIMIT":
                    layer.msg("上传总文件大小不能超过"+uploader.options.fileSizeLimit/1024/1024+"M");
                    break;
                case "Q_TYPE_DENIED":
                    layer.msg("请上传"+uploader.options.accept[0].mimeTypes+"格式文件");
                    break;
                case "F_DUPLICATE":
                    layer.msg("不能重复上传文件！");
                }  
        });

    })
})(jQuery);