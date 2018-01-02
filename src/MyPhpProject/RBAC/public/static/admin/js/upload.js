(function($) {
    $(function() {
        var uploader = WebUploader.create({
            pick: {
                id: '#filePicker',
                label: '点击上传本地图片'
            },
            formData: {
                uid: 123
            },
            accept: { // 只允许选择图片文件格式
                title: 'Images',
                extensions: 'gif,jpg,bmp,png',
                mimeTypes: 'image/jpg,image/jpeg,image/png'
            },
            swf: '../../common/js/webuploader/',
            //限制文件的大小
            fileSingleSizeLimit: 2 * 1024 * 1024,
            fileNumLimit: 1,
            fileSizeLimit: 4 * 1024 * 1024
        });

        uploader.on('ready', function() {
            window.uploader = uploader;
        });

        uploader.on("beforeFileQueued",function(file){
        	 console.group("触发了：beforeFileQueued事件(某个文件开始上传前触发，一个文件只会触发一次)");
        });
        uploader.on("beforeFileQueued",function(file){
    })
})(jQuery);