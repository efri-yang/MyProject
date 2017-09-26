<?php 
	include("MysqliDb.php");

	$db = new MysqliDb ('localhost', 'root', 'yyh', 'sampdb');


	// $data = Array ("i" => 10);
	// $id = $db->insert ('t', $data);
	// if($id){
	// 	echo 'user was created. Id=' . $id;
	// }
	// 
	$cols = Array ("i");

	$result=$db->get('t1',null,'i');

	print_r($result);
    



?>