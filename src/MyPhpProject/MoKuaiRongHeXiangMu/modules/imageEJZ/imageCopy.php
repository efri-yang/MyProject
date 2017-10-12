<?php         



	// session_start();
	// include("../../Path.php");
	// include("../../common/mysqli.php");


	// $db->where("id",1);
	// $result=$db->ObjectBuilder()->getOne('m_image',null);


	// if(!count($result)) die("error: no this recorder"); 

	
 //    $data=mysql_result($result,0,"pic");
 //    echo stripslashes($data);
    
	
?> 

<?php 
	
// $conn=@mysql_connect("localhost","root","yyh");
// mysql_select_db("mokuai",$conn);
// mysql_query("set names utf8");
// $result=mysql_query("select * from m_image where id='1'",$conn);
//     if(!$result) die("error: mysql query"); 
//     $num=mysql_num_rows($result); 
//     if($num<1) die("error: no this recorder");     
//     $data = mysql_result($result,0,"pic"); 
//     mysql_close($conn);

//     echo stripslashes($data);
    //�PNG  IHDR���E�
    //
    //�PNG  IHDR���E�[PL
 ?>



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
 、

 <?php 
	//头部不能为空，否则不能输出东西
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
