<?php
	$mysqli=new mysqli("localhost","root","yyh","test");
	if($mysqli->connect_error){
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();	
	}
	$mysqli->query("set names utf8");

	function getChildById($id=0){
		global $mysqli;
		$resultArr=array();
		$sql="select * from treenodes where pid='$id'";
		$result=$mysqli->query($sql);
		while ($row=$result->fetch_assoc()) {
			$resultArr[]=$row;
		}
		return $resultArr;

	}

	function getTree($parentId=0,$treeArray=array()){
		$child=getChildById($parentId);
		foreach ($child as $key => $value) {
			$treeArray[]=$value;
			$treeArray=getTree($value['id'],$treeArray);
		}
		return $treeArray;
	}

	$data=getTree();
	print_r($data);
?>
