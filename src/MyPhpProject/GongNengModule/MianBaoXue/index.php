<?php
	$mysqli= new mysqli('localhost', 'root', 'yyh', 'concms');
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}
	$mysqli->query("set names utf8");

	/**
	 * 思路1
	 *   分两次查询，第一次是查询文章id 对应的 classid,然后通过classid 去配备column 里面的父栏目
	 */

	$sql="select classid from mc_article where id='8'";

	$result=$mysqli->query($sql);
	$arr=array();

	while($row=$result->fetch_assoc()){
		$arr[]=$row["classid"];
	}

	
	$sql="select classid,pclassid,classname from mc_columns";
	$result=$mysqli->query($sql);
	$columnData=array();

	while ($row=$result->fetch_assoc()) {
		$columnData[]=$row;
	}

	 function displayBread($columnData,$classid){
	 		
	 }



?>

