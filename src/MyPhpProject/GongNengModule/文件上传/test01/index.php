<?php
     header("Content-type:text/html;charset=utf-8");
   include_once("upload.func.php");
    $files=getFiles();
	foreach($files as $fileInfo){
	   $res=uploadFile($fileInfo);
	   print_r($res);
	}
?>