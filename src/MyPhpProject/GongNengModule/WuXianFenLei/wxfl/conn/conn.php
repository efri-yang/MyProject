<?php

  date_default_timezone_set ("Asia/Chongqing");  
  $conn=mysql_connect("localhost","root","yyh");
  if(!$conn){
	  echo "�������ݿ�ʧ�ܣ�";
	  exit();  
  }
  $selectDB=mysql_select_db("imooc",$conn);
  if(!$selectDB){
	  echo "����ѡ�����ݿ⣡";
	  exit;   
   }
  mysql_query("SET names 'utf8'");
  
?>