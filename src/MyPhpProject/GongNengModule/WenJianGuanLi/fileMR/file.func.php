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
				if (is_file ( $path . "/" . $item )) {
					$arr ['file'] [] = $item;
				}
				if (is_dir ( $path . "/" . $item )) {
					$arr ['dir'] [] = $item;
				}
			
			}
		}
		closedir ( $handle );
		return  !!count(@$arr) ? $arr : false;
	}

	
	

?>