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
		$arr[]=$row["pclassid"];
	}

	

	
	$sql="select classid,pclassid,classname from mc_columns";
	$result=$mysqli->query($sql);
	$columnData=array();

	while ($row=$result->fetch_assoc()) {
		$columnData[]=$row;
	};

	print_r($columnData);
	
	// 3  3
	// 3  1
	// 1   0

	 function displayBread($columnData,$pclassid,$str=""){

	 	
 		foreach($columnData as $key=>$value){
 			if($value["classid"]==$pclassid){
 				
 				$str.=$value['classname']."——里面——>";
 				echo $str;
 				echo "<br/>";
 				if($value["pclassid"] !=0){

 					displayBread($columnData,$value["pclassid"],$str);
 				}
 			}
 		}
 	
 		
 		return $str;
	 }

	echo '——外面——><br/>';
	echo displayBread($columnData,3);






?>

