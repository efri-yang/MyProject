<?php
	$fileInfo=$_FILES["file01"];
	
	$ext=@strtolower(end(explode(".",$fileInfo["name"])));
	$uniName=md5(uniqid(microtime(true),true)).".".$ext;
	$destination="upload/".$uniName;
	if(!move_uploaded_file($fileInfo["tmp_name"],$destination)){

	}
	echo json_encode($fileInfo);
?>