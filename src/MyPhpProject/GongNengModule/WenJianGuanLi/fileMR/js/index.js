 function showDetail(filename, filepath) {

     layer.open({
         type: 1,

         title: false, //不显示标题
         content: $('.dialog-show-box'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
         success: function() {
             $('.dialog-show-box img').attr("src", filepath);
         }
     });
 }



 function delFile(filename,path){
	if(window.confirm("您确定要删除嘛?删除之后无法恢复哟!!!")){
			location.href="index.php?act=delFile&filename="+filename+"&path="+path;
	}
}


