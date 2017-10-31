$(function() {
	// 添加的文件数量
    var fileCount = 0;

    // 添加的文件总大小
    var fileSize = 0;

    var $uploaderDefaultContainer=$(".uploader-default-container");
    var $statusBar=$("#J_statusBar");
    var $queueList=$("#J_queue-list");
    var percentages = {};
    var $upload = $("#J_uploadBtn");
    //
    var state = 'pedding';
    var uploader = WebUploader.create({
        pick: {
            id: '#filePicker',
            label: '点击选择图片'
        },
    });

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

    uploader.on("beforeFileQueued",function(file){
    	console.group("触发了：beforeFileQueued事件(当文件被加入队列之前触发)");
    });

     uploader.on("uploadProgress",function(file,totalPercent){
            console.dir("xxx")
     });

    uploader.on("fileQueued",function(file){
    	console.group("触发了：fileQueued事件(当文件被加入队列以后触发)");
    	fileCount++;
    	fileSize += file.size;

    	if(fileCount >=1){
    		//如果有上传的图片，那么默认的框就要隐藏掉,
    		//此时，文件被加入队列，这个时候就要显示出来，创建views展示城
    		$uploaderDefaultContainer.hide();
            $statusBar.show();
            addFile(file);
    	}

    });

    uploader.on("filesQueued",function(file){
    	console.group("触发了：filesQueued事件(当一批文件添加进队列以后触发)");
    });

    uploader.on("uploadStart",function(file){
    	console.group("触发了：uploadStart事件(某个文件开始上传前触发，一个文件只会触发一次)");
    });


    function addFile(file){
        var $li = $( '<li id="' + file.id + '">' +
                '<p class="imgWrap"></p>'+
                '<p class="progress"><span></span></p>' +
                '<p class="title">' + file.name + '</p>' +
                '</li>' );
        
        $prgress = $li.find('p.progress span'),
        $wrap = $li.find( 'p.imgWrap' ),
        $info = $('<p class="error"></p>');
        $wrap.text( '预览中' );

        uploader.makeThumb( file, function( error, src ) {
            var img;
            if ( error ) {
                $wrap.text( '不能预览' );
                return;
            }
            img = $('<img src="'+src+'">');
            $wrap.empty().append( img );
            percentages[ file.id ] = [ file.size, 0 ];
            file.rotation = 0;
        });

        file.on("statuschange",function(){

        })


        $queueList.append($li);

    }

    $upload.on("click",function(){
      
        if ( $(this).hasClass( 'disabled' ) ) {
            return false;
        }

        if ( state === 'ready' ) {
            alert("xxxx");
             uploader.upload();
        } else if ( state === 'paused' ) {
            uploader.upload();
        } else if ( state === 'uploading' ) {
            uploader.stop();
        }

    })
    

})	