<?php 





  header("Content-type:text/html;charset=utf-8");
  $fileInfo=$_FILES["myFile"];
  $size=$fileInfo["size"];
  $tmp_name=$fileInfo["tmp_name"];
  $error=$fileInfo["error"];
  $maxSize=2097152;
  $allowExt=array("jpeg","jpg","gif","png","wbmp");
  $flag=true;//是否是真正的图片格式
  print_r($fileInfo);
  if($error==0){//上传成功
     if($size > $maxSize){
	   exit("上传文件过大");   
     }
	 //判断类型是否我们规定的类型
	 $ext=@strtolower(end(explode(".",$fileInfo["name"])));
     if(!in_array($ext,$allowExt)){
		   exit("上传文件的类型不正确！"); 
     }
	 //判断是否是http post上传来的
	 if(!is_uploaded_file($tmp_name)){
	    exit("文件不是以http的post的方式提交！");	 
     }
	 if($flag){
	     if(!getimagesize($tmp_name)){
		   exit("不是真正的图片类型！");	 
	     }	 
     }
	 $path="uploads";
	 if(!file_exists($path)){
	   mkdir($path,0777,true);
	   chmod($path,0777);    	 
     }
	 
	 $uniName=md5(uniqid(microtime(true),true)).".".$ext;
	 $destination=$path."/".$uniName;
	 if(move_uploaded_file($tmp_name,$destination)){
		  echo "上传成功！";
	 }else{
	       echo "上传失败！";	 
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