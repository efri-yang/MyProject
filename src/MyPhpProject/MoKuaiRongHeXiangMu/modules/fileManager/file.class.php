<?php
	function getFiles($path){
		
		$fileArr=array();
		$fileResouce=opendir($path);

		while(false !==($fileName = readdir($fileResouce))){

			 //考虑到0的文件夹  
			if($fileName !="." && $fileName !=".."){
				// $file=$path."/".$fileName;
				$fileArr[]=$fileName;
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

	function getFileExt($file){
		return pathinfo($file,PATHINFO_EXTENSION);
	}

	function getFileType($file){
		$imageExt=array("gif","jpg","jpeg","png");
		$fileType=fileType($file);
		if($fileType=="dir"){
			return "dir";
		}elseif($fileType=="file"){
			$fileExt=pathinfo($file,PATHINFO_EXTENSION);
			if(in_array($fileExt,$imageExt)){
				return "image";
			}else{
				return "file";
			}
		}
	}


	function delFiles($file){
		$fileType=getFileType($file);
		if($fileType=="dir"){
			$handle=opendir($file);
			while(($item=readdir($handle))!==false){
				if($item!="."&&$item!=".."){
					if(is_file($file."/".$item)){
						unlink($file."/".$item);
					}
					if(is_dir($file."/".$item)){
						$func=__FUNCTION__;
						$func($file."/".$item);
					}
				}
			}
			closedir($handle);
			rmdir($file);
		}else{
			unlink($file);
		}
		return true;
	}


function dl_file($file){  
   
    //First, see if the file exists  
    if (!is_file($file)) { die("<b>404 File not found!</b>"); }  
   
    //Gather relevent info about file  
    $len = filesize($file);  
    $filename = basename($file);  
    $file_extension = strtolower(substr(strrchr($filename,"."),1));  
   
    //This will set the Content-Type to the appropriate setting for the file  
    switch( $file_extension ) {  
          case "pdf": $ctype="application/pdf"; break;  
      case "exe": $ctype="application/octet-stream"; break;  
      case "zip": $ctype="application/zip"; break;  
      case "doc": $ctype="application/msword"; break;  
      case "xls": $ctype="application/vnd.ms-excel"; break;  
      case "ppt": $ctype="application/vnd.ms-powerpoint"; break;  
      case "gif": $ctype="image/gif"; break;  
      case "png": $ctype="image/png"; break;  
      case "jpeg":  
      case "jpg": $ctype="image/jpg"; break;  
      case "mp3": $ctype="audio/mpeg"; break;  
      case "wav": $ctype="audio/x-wav"; break;  
      case "mpeg":  
      case "mpg":  
      case "mpe": $ctype="video/mpeg"; break;  
      case "mov": $ctype="video/quicktime"; break;  
      case "avi": $ctype="video/x-msvideo"; break;  
   
      //The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)  
      case "php":  
      case "htm":  
      case "html":  
      case "txt": die("<b>Cannot be used for ". $file_extension ." files!</b>"); break;  
   
      default: $ctype="application/force-download";  
    }  
   
    //Begin writing headers  
    header("Pragma: public");  
    header("Expires: 0");  
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
    header("Cache-Control: public");   
    header("Content-Description: File Transfer");  
       
    //Use the switch-generated Content-Type  
    header("Content-Type: $ctype");  
   
    //Force the download  
    $header="Content-Disposition: attachment; filename=".$filename.";";  
    header($header );  
    header("Content-Transfer-Encoding: binary");  
    header("Content-Length: ".$len);  
    @readfile($file);  
    exit;  
}  
?>