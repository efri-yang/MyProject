$(function(){

	var fileCount=0;
	var fileSize=0;

    
    var $noPicBox=$("#J_no-pic");
    var $uploaderList=$('<ul class="upload-img"></ul>');
    $uploaderList.appendTo($("#J_uploader-list"));


	var uploader = WebUploader.create({
        pick: {
            id: '#filePicker',
            label: '点击上传本地图片'
        },
        formData: {
            classid:$classId
        },
        accept: {// 只允许选择图片文件格式
            title: 'Images',
            extensions: 'gif,jpg,bmp,png',
            mimeTypes: 'image/jpg,image/jpeg,image/png'
        },
        server: './js/fileupload2.php',
        swf: '../../static/js/webuploader/Uploader.swf',
        //限制文件的大小
        fileSingleSizeLimit:4 * 1024 * 1024,
        fileNumLimit:5,
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
   uploader.on("beforeFileQueued",function(file){
        var files=uploader.getFiles();
        $.each(files,function(key,val){
            uploader.removeFile(val,true);
        });
        fileCount=0;
        $uploaderList.children().remove();
        
   });
   uploader.on('fileQueued', function( file ) {
    	fileCount++;
    	if(fileCount===1){
    		$noPicBox.hide();
            addFile(file);
    	} 
        var files=uploader.getFiles();
        console.dir(files)
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
         
    });



   function showError($elem,code){
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

   function addFile(file){
       var $li=$('<li id="'+file.id+'">'+
                '<div class="img-wrap preview"></div>'+
                '<div class="handle-bar">'+
                    '<span class="upload-btn">上传</span>'+
                    '<span class="del-btn">删除</span>'+
                '</div>'+
                '<div class="progress"><span></span></div>'+
                '<div class="error"></div>'+
                '<div class="success"></div>'+
            '</li>');
        $li.appendTo($uploaderList);

        var $imgWrap=$li.find(".img-wrap");
        var $progress=$li.find(".progress");
        var $error=$li.find(".error");
        var $success=$li.find(".success");
        var $handleBar=$li.find(".handle-bar");
        var $uploadBtn=$li.find(".upload-btn");
        var fileState=uploader.getStats();

        $imgWrap.text("预览中...");

        uploader.makeThumb( file, function( error, src ) {
            if(error){
                showError($error,error);
                return false;
            }
            $imgWrap.text("").removeClass("preview");
            $('<img src="'+src+'" />').appendTo($imgWrap);
        });
        //图片已经生成预览
        file.on('statuschange',function(cur, prev){
            if(cur=="invalid" || cur=="error"){
                showError($error);
            }else if(cur=='interrupt'){
                showError($error,'interrupt');
            }else if(cur=="progress"){
                $progress.show();
            }else if(cur=="complete"){
                $progress.hide().find("span").width(0);
                $handleBar.hide();
                $success.show();
                $(".webuploader-pick").text("重新上传图片")
            }
        });
        $uploadBtn.on("click",function(){
           uploader.upload();
        })
    }
})