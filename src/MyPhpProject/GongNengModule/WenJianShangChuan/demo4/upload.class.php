<?php
  	function getFiles(){
  		$i=0;
  		foreach ($_FILES as $file){
  			if(is_string($file['name'])){
  				$files[$i]=$file;
  				$i++;
  			}elseif(is_array($file[name])){
  				foreach ($file['name'] as $key => $value) {
  					$file[$i]['name']=$file['name'][$key];
  					$file[$i]['type']=$file['type'][$key];
  					$file[$i]['tmp_name']=$file['tmp_name'][$key];
  					$file[$i]['error']=$file['error'][$key];
  					$file[$i]['size']=$file['size'][$key];
  					$i++;
  				}
  			}
  		}
  		return $files;
  	}

  	function  uploadFile(){
  		$flag=true;
  		$allowExt=array("jpeg","jpg","gif","png","wbmp");
  		if($fileInfo["error"] ===UPLOAD_ERR_OK){
  			if($fileInfo["size"] > $maxSize){
  				$reg['mes']=$fileInfo['name']."上传文件过大";
  			}
  			if(!in_array($ext,$allowExt)){
				 $reg['mes']=$fileInfo['name']."非法文件类型";   
			}
			if($flag){
			     if(!getimagesize($fileInfo["tmp_name"])){
				   $reg['mes']=$fileInfo['name']."不是真正的图片类型！";	 
			     }	 
		     }
		       if(!is_uploaded_file($fileInfo["tmp_name"])){
				    $reg['mes']=$fileInfo['name']."文件不是以http的post的方式提交！";	 
			    }
			    if(!$res) return $res;
			    $path="uploads";

			    if(!file_exists($path)){
				   mkdir($path,0777,true);
				   chmod($path,0777);    	 
			     }
			    $uniName=getUiname();
			    $destination=$path."/".$uniName;
			   if(!move_uploaded_file($fileInfo["tmp_name"],$destination)){
				  $reg['mes']="上传失败！";
			   }
			   $res['dest']=$destination;
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
  		}
  	}
?>