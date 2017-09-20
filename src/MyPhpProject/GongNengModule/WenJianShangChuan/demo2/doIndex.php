<?php
  header("Content-type:text/html;charset=utf-8");
  include_once("upload.func.php");
  $fileInfo=$_FILES["myFile"];
  $newName=uploadFile($fileInfo);
  echo $newName;
?>