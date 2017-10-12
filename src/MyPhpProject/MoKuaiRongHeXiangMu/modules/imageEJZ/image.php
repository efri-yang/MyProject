<?php 	
	$conn=@mysql_connect("localhost","root","yyh");
	mysql_select_db("mokuai",$conn);
	mysql_query("set names utf8");
    if(isset($_GET['recid'])){

    	$result=mysql_query("select * from m_image where id='".$_GET['recid']."'",$conn);
    	if(!$result) die("error: mysql query"); 
    	$num=mysql_num_rows($result); 
   		if($num<1) die("error: no this recorder");     
    	$data = mysql_result($result,0,"pic"); 
    	mysql_close($conn);
    	echo stripslashes($data);
    }
 ?>
