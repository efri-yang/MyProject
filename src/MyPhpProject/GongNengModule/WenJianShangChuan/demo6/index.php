<?php

header("Content-type:text/html;charset=utf-8");


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


function uploadFile($file,$allowMime=array("jpeg","jpg","gif","png","wbmp"),$maxSize=1000000,$flag=true,$path="uploads"){
	if($file["error"]===UPLOAD_ERR_OK){
		if($file["size"] > $maxSize){
			$res["msg"]="上传的文件超过太大了(超过了maxSize)！";
			return $res;
		}
		$suffix=strtolower(end(explode(".",$file['name'])));
		if(!in_array($suffix,$allowMime)){
			$res["msg"]=$file['name']."上传的文件类型不对！";
			return $res;
		}
		if(!is_uploaded_file($file["tmp_name"])){
			$res["msg"]=$file['name']."上传的文件不是通过HTTP POST上传的！";
			return $res;
		}
		if($flag){
			if(!@getimagesize($file['tmp_name'])){
				$res["msg"]=$file['name']."上传的不是真正范围的文件类型！";
				return $res;
			}
		}
		if(!file_exists($path)){
			mkdir($path,07777,true);
			chmod($path,07777);
		}
		$uniName=md5(uniqid(microtime(true),true)).".".$suffix;//生成唯一的名字
		$destination=$path."/".$uniName;
		if(!move_uploaded_file($file["tmp_name"],$destination)){
			$res["msg"]=$file['name']."上传的文件move_uploaded_files失败！";
			return $res;
		}
		$res['msg']=$file['name'].'上传成功';
		$res['dest']=$destination;

		return $res;

	}else{
		switch ($file["error"]) {
			case '1':
				$res["msg"]=$file['name']."上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值！";
				break;
			case '2':
				$res["msg"]=$file['name']."上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值！";
				break;
			case '3':
				$res["msg"]=$file['name']."文件上传不完整！";
				break;
			case '4':
				$res["msg"]=$file['name']."没有文件被上传！";
				break;
			case '5':
				$res["msg"]=$file['name']."没有文件被上传！";
				break;
			case '6':
				$res["msg"]=$file['name']."找不到临时文件夹！";
				break;
			
			default:
				$res["msg"]=$file['name']."文件上传失败！";
				break;
		}
		return $res;
	}
}

$files =getFiles($_FILES);

foreach ($files as $key => $value) {
	$res=uploadFile($value);
	echo $res['msg'],'<br/>';
	$uploadFiles[]=@$res['dest'];
}

print_r(array_filter($uploadFiles));



// print_r($uploadFiles);


