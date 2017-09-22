<?php


	function transByte($size){
		$i=0;
		$unit=array ("B", "KB", "MB", "GB", "TB", "EB" );
		while ($size > 1024) {
			$size/=1024;//x = x / y
			$i++;
		}
	
		return round($size,2).$unit[$i];
	}

	function readDirectory($path){
		$handle = opendir ( $path );
		while ( ($item = readdir ( $handle )) !== false ) {
			//$item包含.和..这2个特殊目录
			if ($item != "." && $item != "..") {
				if (is_file ( $path . "/" . $item )) {//判断是不是文件
					$arr ['file'] [] = $item;
				}
				if (is_dir ( $path . "/" . $item )) {//是否目录
					$arr ['dir'] [] = $item;
				}
			
			}
		}
		closedir ( $handle );
		return  !!count(@$arr) ? $arr : false;
	}


	 function alertMes($mes,$url){
		echo "<script type='text/javascript'>alert('{$mes}');location.href='{$url}';</script>";
	}

	/**
 *检测文件名是否合法
 * @param string $filename
 * @return boolean
 */
function checkFilename($filename){
	$pattern = "/[\/,\*,<>,\?\|]/";
	if (preg_match ( $pattern,  $filename )) {
		return false;
	}else{
		return true;
	}
}


function renameFile($oldname,$newname){
	if(checkFilename($newname)){
		$path=dirname($oldname);
		if(!file_exists($path."/".$newname)){
			if(rename($oldname,$path."/".$newname)){
				return "重命名成功";
			}else{
				return "重命名失败";
			}
		}else{
			return "存在同名文件，请重新命名";
		}
	}else{
		return "非法文件名";
	}
}


function copyFile($filename,$dstname){
	if(file_exists($dstname)){
		if(!file_exists($dstname."/".basename($filename))){
			if(copy($filename,$dstname."/".basename($filename))){
				$mes="文件复制成功";
			}else{
				$mes="文件复制失败";
			}
		}else{
			$mes="存在同名文件";
		}
	}else{
		$mes="目标目录不存在";
	}
	return $mes;
}

function cutFile($filename,$dstname){
	if(file_exists($dstname)){
		if(!file_exists($dstname."/".basename($filename))){
			if(rename($filename,$dstname."/".basename($filename))){
				$mes="文件剪切成功";
			}else{
				$mes="文件剪切失败";
			}
		}else{
			$mes="存在同名文件";
		}
	}else{
		$mes="目标目录不存在";
	}
	return $mes;
}


function delFile($filename){
	if(unlink($filename)){
		$mes="文件删除成功";
	}else{
		$mes="文件删除失败";
	}
	return $mes;
}


/**
 * 下载文件操作
 * @param string $filename
 */
function downFile($filename){
	header("content-disposition:attachment;filename=".basename($filename));
	header("content-length:".filesize($filename));
	readfile($filename);
}




/**
 * 重命名文件夹
 * @param string $oldname
 * @param string $newname
 * @return string
 */

function renameFolder($oldname,$newname){
	//检测文件夹名称的合法性
	if(checkFilename(basename($newname))){
		//检测当前目录下是否存在同名文件夹名称
		if(!file_exists($newname)){
			// if(rename($oldname,$newname)){
			if(rename($oldname,$newname)){
				$mes="重命名成功";
			
			}else{
				$mes="重命名失败";
			}
		}else{
			$mes="存在同名文件夹";
		}
	}else{
		$mes="非法文件夹名称";
	}
	return $mes;
}


?>