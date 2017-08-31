<?php
   class upload{
	   protected $fileName;
	   protected $maxSize;
	   protected $allowMime;
	   protected $allowExt;
	   protected $uploadPath;
	   protected $imgFlag;
	   protected $fileInfo;
	   
	   public function _constrnct($fileName="myFile",$uploadPath='./uploads',$imgFlag=true,$maxSize=5242880,$allowExt=array("jpeg","jpg","png","gif"),$allowMime=array('image/jpeg','image/png','image/gif')){
		  $this->fileName=$fileName;
		  $this->maxSize=$maxSize;
		  $this->allowMime=$allowMime;
		  $this->allowExt=$allowExt;
		  $this->uploadPath=$uploadPath;
		  $this->imgFlag=$imgFlag;
		  $this->fileInfo=$_FILES[$this->fileName];   
	   } 
	   
	   protected function checkError(){
		   if($this->fileInfo["error"] > 0){
			     switch($this->fileInfo["error"]){
				     case 1:
					    $this->error="上传文件超过了php配置文件中upload_max_filesize选项的值";
						break;	 
					 case 2:
					    $this->error="超过了表单max_file_size限制的";
						break;	 
					 case 3:
					    $this->error="文件部分被上传";
						break;	 
					 case 4:
					    $this->error="没有选择上传文件";
						break;
					 case 6:
					    $this->error="没有找到临时目录";
						break;	
					 case 7:
					    $this->error="文件不可写";
						break;
					 case 8:
					    $this->error="由于php的扩展程序中断文件上传";
						break;	 	  	 
				 }
			     return false;
		    }  
		    return true; 
	   }
	     
   }
?>