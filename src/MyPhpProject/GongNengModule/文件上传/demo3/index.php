<?php
  header("Content-type:text/html;charset=utf-8");
  include_once("../demo2/upload.func.php");
  //echo $_FILES["myFile1"]["error"];
  //echo $_FILES["myFile2"]["error"];
   //print_r($_FILES);
  //echo count($_FILES); 
  foreach($_FILES as $fileInfo){
	  echo "xxx";
	$arr[]=uploadFile($fileInfo);
  }
  print_r($arr);

?>