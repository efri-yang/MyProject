<?php

    function getFiles(){
		$i=0;
		foreach($_FILES as $file){
			 if(is_string($file["name"])){//如果是字符算的话
				 $files[$i]=$file;
				 $i++;
			 }else if(is_array($file)){
				foreach($file["name"] as $key=> $value){
					   $files[$i]["name"]=$file["name"][$key];
					   $files[$i]["type"]=$file["type"][$key];
					   $files[$i]["tmp_name"]=$file["tmp_name"][$key];
					   $files[$i]["error"]=$file["error"][$key];
					   $files[$i]["size"]=$file["size"][$key];
					   $i++;
				}
			 }
		}
		return $files;
	}
	
	function uploadFile($fileInfo){
	      if($fileInfo["error"]=="UPLOAD_ERR_OK"){
			  //判断文件的大小
			  $res;
			  $maxSize=1048576;
			  if($fileInfo["size"] > $maxSize){
				  $res["mes"]==$fileInfo["name"]."上传文件过大";   
			  }
			  //判断类型是否正确
			  $ext=@strtolower(end(explode(".",$fileInfo["tmp_name"])));
			  $allowExt=array("jpeg","jpg","gif","png");
			  if(!in_array($ext,$allowExt)){
				  @$res["mes"]== $fileInfo["name"]."上传的文件类型不符合"; 
			  }
			  
			  //判断是否是真正图片
			  $flag=true;
			  if($flag){
				   if(!getimagesize($fileInfo["tmp_name"])){
					 $res["mes"]== $fileInfo["name"]."不是真正的图片类型！";  
				   }  
			  }
			  //判断是否是通过http post 发送过来的
			  if(!is_uploaded_file($fileInfo["tmp_name"])){
				   $res["mes"]=$fileInfo["name"]."文件不是通过HTTP POST的方式上传上来的！";	 	 
			  }
			  
			  if(@$res){ return $res;}
			  
			  //判断文件是否存在
			  $path="uploads";
			  if(!file_exists($path)){
				  mkdir($path,0777,true);
				  chmod($path,0777);
			  }
			  $uniName=md5(uniqid(microtime(true),true));
			  $destination=$path."/".$uniName.$ext;
			  if(!move_uploaded_file($fileInfo["tmp_name"],$destination)){
				  $res["mes"]=$fileInfo["name"]."文件移动失败";
			  }else{
				  $res["mes"]=$fileInfo["name"]."文件上传成功";
			  }
			  $res["dest"]=$destination;
			  return $res;
			        
		  }else{
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
			  return $mes;
		  }
	}

	
	
	
	
	
	
	
	
	
	
	
	
?>