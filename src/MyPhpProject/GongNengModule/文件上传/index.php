<?php













header("Content-type:text/html;charset=utf-8");




   $fileInfo=$_FILES["myFile"];
   $filename=$fileInfo["name"];
   $type=$fileInfo["type"];
   $tmp_name=$fileInfo["tmp_name"];
   $size=$fileInfo["size"];
   $error=$fileInfo["error"];
   
   if($error=="upload_err_ok"){//或者是零
	  if(move_uploaded_file($tmp_name,"uploads/".$filename)){
		 echo "文件".$filename."上传成功！";   
	  }else{
		 echo "文件".$filename."上传失败！";     
	  }
   }else{
	   switch($error){
		  case 1:
		      echo "上传文件超过了php配置文件中upload_max_filesize选项的值";
			  break;
		  case 2:
		  	  echo "超过了表单max_file_size限制的大小";
			  break;
		  case 3:
		      echo "文件部分上传";
			  break;
		  case 4:
		      echo "没有选择上传文件";
			  break;
		  case 6:
		     echo "没有找到临时目录";
			 break;
		  case 7:
		  case 8:
		      echo "系统错误";
			  break;	  
			    
	   }   
   }
   
   
   
   
   
   
   
   
   
   
   
   






   
   
?>