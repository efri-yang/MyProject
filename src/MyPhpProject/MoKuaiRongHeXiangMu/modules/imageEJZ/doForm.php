<?php
	include("../../config.inc.php");
    include($dirName."/common/mysqli.php");

    $fileInfo=$_FILES['image'];

    if($fileInfo['error']==0){
    	$fileFullName=$fileInfo['name'];
    	$fileNameArr=explode(".",$fileFullName);
    	$date  = date('Y-m-d H:i:s');
    	$fileName=$fileNameArr[0];
    	$type=$fileInfo['type'];
    	$fp    = fopen($fileInfo['tmp_name'], 'rb');
    	$image = addslashes(fread($fp, filesize($fileInfo['tmp_name'])));

    	$data=array(
    		"name"=>$fileName,
    		"pic"=>$image,
    		"type"=>$type,
    		"date"=>$date
    	); 

    	$id=$db->insert('m_image',$data);
    	if($id){
    		echo "插入成功！";
    	}

    }
?>