<?php
	function getFiles(){
		$path="./files/";
		$fileArr=array("file"=>array(),'dir'=>array());
		$fileResouce=opendir($path);

		while(false !==($fileName = readdir($fileResouce))){

			 //考虑到0的文件夹  
			if($fileName !="." && $fileName !=".."){
				$file=$path.$fileName;
				if(is_file($file)){
					$fileArr['file'][]=$file;
				}else if(is_dir($file)){
					$fileArr['dir'][]=$file;
				}
			}
		}
		return $fileArr;
		
	}

	
?>