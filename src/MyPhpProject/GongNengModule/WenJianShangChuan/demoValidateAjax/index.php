<?php

header("Content-type:text/html;charset=utf-8");


class upload{
	protected $filename;
	protected $maxSize;
	protected $allowMime;
	protected $imgFlag;
	protected $paths;
	protected $error;
	

	function __construct($fileInfo,$uploadPath='./uploads',$imgFlag=true,$maxSize=5242880,$allowSuffix=array('jpeg','jpg','png','gif')){
			// $this->filename=$filename;
			$this->maxSize=$maxSize;
			$this->allowSuffix=$allowSuffix;
			$this->imgFlag=$imgFlag;
			$this->uploadPath =$uploadPath;
			$this->fileInfo=$fileInfo;

			

	}

	

	protected function checkError(){
		if($this->fileInfo['error']>0){
			switch($this->fileInfo['error']){
				case 1:
					$this->error='超过了PHP配置文件中upload_max_filesize选项的值';
					break;
				case 2:
					$this->error='超过了表单中MAX_FILE_SIZE设置的值';
					break;
				case 3:
					$this->error='文件部分被上传';
					break;
				case 4:
					$this->error='没有选择上传文件';
					break;
				case 6:
					$this->error='没有找到临时目录';
					break;
				case 7:
					$this->error='文件不可写';
					break;
				case 8:
					$this->error='由于PHP的扩展程序中断文件上传';
					break;	
			}
			return false;
		}else{
			return true;
		}
	}

	protected function checkSize(){
		if($this->fileInfo["size"] > $this->maxSize){
			$this->error='上传文件过大';
			return false;
		}
		return true;
	}

	protected function checkSuffix(){
		$this->suffix=strtolower(pathinfo($this->fileInfo['name'],PATHINFO_EXTENSION));
		if(!in_array($this->suffix,$this->allowSuffix)){
			$this->error='不允许的扩展名';
			return false;
		}
		return true;
	}

	protected function checkTrueImg(){
		if($this->imgFlag){
			if(!@getimagesize($this->fileInfo['tmp_name'])){
				$this->error='不是真实图片';
				return false;
			}
			return true;
		}
	}

	protected function checkHTTPPost(){
		if(!is_uploaded_file($this->fileInfo['tmp_name'])){
			$this->error='文件不是通过HTTP POST方式上传上来的';
			return false;
		}
		return true;
	}

	protected function showError(){
		print_r('<span style="color:red">'.$this->error.'</span>');
	}

	protected function checkUploadPath(){
		if(!file_exists($this->uploadPath)){
			mkdir($this->uploadPath,0777,true);
		}
	}

	protected function getUniName(){
		return md5(uniqid(microtime(true),true));
	}

	public function uploadFile(){
		if($this->checkError()&&$this->checkSize()&&$this->checkSuffix()&&$this->checkTrueImg()&&$this->checkHTTPPost()){
			$this->checkUploadPath();
			$this->uniName=$this->getUniName();
			$this->destination=$this->uploadPath.'/'.$this->uniName.'.'.$this->suffix;
			$this->resArr=array();
			if(@move_uploaded_file($this->fileInfo['tmp_name'], $this->destination)){
				$this->resArr["error"]=false;
				$this->resArr["txt"]=$this->destination;
				return $this->resArr;
			}else{
				$this->error='文件移动失败';
				
			}
		}
		$this->resArr["error"]=true;
		$this->resArr["txt"]=$this->error;
		return $this->resArr;
	}
}

function getFiles($files){
    $i = 0;
    foreach ($files as $fileInfo) {
        if (is_string($fileInfo['name'])) {
            $fileArr[$i] = $fileInfo;
            $i++;
        } elseif (is_array($fileInfo)) {
            foreach ($fileInfo['name'] as $key => $value) {
                $fileArr[$i]["name"]     = $fileInfo['name'][$key];
                $fileArr[$i]["type"]     = $fileInfo['type'][$key];
                $fileArr[$i]["tmp_name"] = $fileInfo['tmp_name'][$key];
                $fileArr[$i]["error"]    = $fileInfo['error'][$key];
                $fileArr[$i]["size"]     = $fileInfo['size'][$key];
                $i++;
            }
        }
    }

    return $fileArr;
}




// $dest[]=$fileObj["name"];

$files =getFiles($_FILES);

foreach ($files as $key => $value) {
	
	$upload=new upload($value);
    
	$dest[]=$upload->uploadFile();
}

echo json_encode($dest);


// header('content-type:text/html;charset=utf-8');
// require_once 'upload.class.php'; 
// 


// echo 0;
// print_r($dest);

// print_r($dest);
// 
// $upload=new upload('myfile1');
// $dest=$upload->uploadFile();
// echo $dest;



