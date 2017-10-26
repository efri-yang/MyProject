<?php
	$path="../../";
	$distPath=$_POST["finalPath"];
	$finalPath=$path.$distPath;


	if(file_exists($finalPath) && is_dir($finalPath)){
		echo 1;
	}else{
		echo 0;
	}
?>