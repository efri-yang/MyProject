<?php

  date_default_timezone_set ("Asia/Chongqing");  
  $conn=mysql_connect("localhost","root","yyh");
  if(!$conn){
	  echo "连接数据库失败！";
	  exit();  
  }
  $selectDB=mysql_select_db("imooc",$conn);
  if(!$selectDB){
	  echo "不能选中数据库！";
	  exit;   
   }
  mysql_query("SET names 'utf8'");
  
?>