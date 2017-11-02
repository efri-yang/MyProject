$(function(){

	var fileCount=0;
	var fileSize=0;

    var $imgBox=$("#J_upload-imgbox");

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
        server: './fileupload.php',
        swf: '../../static/js/webuploader/Uploader.swf',
        //限制文件的大小
        fileSingleSizeLimit:2 * 1024 * 1024,
        fileNumLimit:1,
        fileSizeLimit: 4 * 1024 * 1024
    });

    uploader.on("filesQueued", function(file) {
    	fileCount++;
    	if(fileCount >1){
    		
    	}
    })
    
})