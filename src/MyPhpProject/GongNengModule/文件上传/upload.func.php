<?php



   $fileInfo=$_FILES["myFile"];
   if($fileInfo["error"] > 0){
	 switch($fileInfo["error"]){
		  case 1:
		      $mes="上传文件超过了php配置文件中upload_max_filesize选项的值";
			  break;
		  case 2:
		  	  $mes="超过了表单max_file_size限制的大小";
			  break;
		  case 3:
		      $mes="文件部分上传";
			  break;
		  case 4:
		      $mes="没有选择上传文件";
			  break;
		  case 6:
		     $mes="没有找到临时目录";
			 break;
		  case 7:
		  case 8:
		      $mes="系统错误";
			  break;	  
			    
	   } 
	   exit($mes);     
   }
   $ext=strtolower(end(explode(".",$fileInfo["name"])));
   //检测上传文件的类型
   if(!in_array($ext,$allowExt)){
	   exit("非法文件类型");   
   }
   //检测上传图片的大小是否 符合规范
   $maxSize=2097152;
   if($fileInfo["size"] > $maxSize){
	      exit("上传文件过大!");
   }
   
   //检测文件是否通过http post 方式上传上来
   if(!is_uploaded_file($fileInfo["tmp_name"])){
	    exit("文件不是通过http post 上传上来的");      
   }
   if(@move_uploaded_file($fileInfo["tmp_name"],$destination)){
	   exit("文件移动失败！"); 
   }
   
   
   
   
?>