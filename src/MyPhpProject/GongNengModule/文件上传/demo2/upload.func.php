<?php
   //$fileInfo=$_FILES["myFile"];
   
 function uploadFile($fileInfo,$allowExt=array("jpeg","jpg","gif","png","wbmp",""),$maxSize=2097152,$path="uploads",$flag=true){
	 
 
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
	  return false;
   }
   $ext=@strtolower(end(explode(".",$fileInfo["name"])));
   //$allowExt=array("jpeg","jpg","gif","png","wbmp");
   if(!in_array($ext,$allowExt)){
	 exit("非法文件类型");   
   }
  // $maxSize=2097152;
   if($fileInfo["size"] > $maxSize){
	   exit("上传文件过大");   
   }
   //$flag=true;
   if($flag){
	     if(!getimagesize($fileInfo["tmp_name"])){
		   exit("不是真正的图片类型！");	 
	     }	 
     }
   
   
   if(!is_uploaded_file($fileInfo["tmp_name"])){
	    exit("文件不是以http的post的方式提交！");	 
    }
	//$path="uploads";
	 if(!file_exists($path)){
	   mkdir($path,0777,true);
	   chmod($path,0777);    	 
     }
	 $uniName=md5(uniqid(microtime(true),true)).".".$ext;
	 $destination=$path."/".$uniName;
	 if(!@move_uploaded_file($fileInfo["tmp_name"],$destination)){
		  echo "上传失败！";
	 }
	 //echo "上传成功！";	
    /*return  array(
           'newName'=>$destination,
		   "size"=>$fileInfo["size"],
		   "type"=>$fileInfo["type"]
    )*/
	return $destination;
 }
?>