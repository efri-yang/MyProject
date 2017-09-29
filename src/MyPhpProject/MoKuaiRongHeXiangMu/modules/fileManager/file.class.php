<?php
	function getFiles(){
		$path="./files/";
		$fileArr=array();
		$fileResouce=opendir($path);

		while(false !==($fileName = readdir($fileResouce))){

			 //考虑到0的文件夹  
			if($fileName !="." && $fileName !=".."){
				$file=$path.$fileName;
				$fileArr[]=$file;
			}
		}
		return $fileArr;
		
	}


	function getSize($file){
		$size=filesize($file);
		$i=0;
		$unitArr=array('B','KB','MB','GB','TB');
		while ($size > 1024) {
			$size=$size/1024;
			$i++;
		}
		return round($size,2).$unitArr[$i];
	}

	function getFileType($file){
		$imageExt=array("gif","jpg","jpeg","png");
		$fileType=fileType($file);
		
		if($fileType=="dir"){
			return "dir";
		}elseif($fileType==file){
			$fileExt=pathinfo($file,PATHINFO_EXTENSION);
			if(in_array($fileExt,$imageExt)){
				return "image";
			}else{
				return "file";
			}
		}else{
			// echo  "xxx";
		}
	}

	
?>