<?php
header("Content-type:text/html;charset=utf-8");
   $fileInfo=$_FILES["myFile"];
   $maxSize=2097152;//允许上传文件最大值
   $allowExt=array("jpeg","jpg","png","gif","wbmp");
   $flag=true;//是否是真实的图片
   if($fileInfo["error"]==0){
	   //判断上传文件的大小
	   if($fileInfo["size"] > $maxSize){
		   exit("上传文件过大");   
	   }
	   $ext=strtolower(end(explode(".",$fileInfo["name"])));
	   echo $ext;
	   //$ext=pathinfo($fileInfo["name"],PATHINFO_EXTENSION);
	   if(!in_array($ext,$allowExt)){
		   exit("非法文件类型");   
	   }
	   //判断http请求post上传上来
	   if(!is_uploaded_file($fileInfo['tmp_name'])){
		     exit("文件不是通过http post 上传上来的");   
	   }
	   //检测是否为真实的图片类型 getimagesize（$filename）:得到指定图片的信息，如果是图片返回数组，如果不是图片 返回false;
	   if($flag){
		   if(!getimagesize($fileInfo["tmp_name"])){
			   exit("不是真正图片类型");   
		   }   
	    }
	   $path="uploads";
	   if(file_exists($path)){
		  mkdir($path,0777,true);
		  chmod($path,0777);   
		}
	   //$destination=$path."/".$fileInfo["name"];
	   //确保文件名唯一，防止重名产生覆盖
	   $uniName=md5(uniqid(microtime(true),true)).".".$ext;
	   $destination=$path."/".$uniName;
	   if(move_uploaded_file($fileInfo["tmp_name"],$destination)){
		  echo "文件上传成功！";   
	   }else{
		  echo "文件上传失败！";   
	   }
   }else{
	  //匹配错误的信息
	  switch($fileInfo["error"]){
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