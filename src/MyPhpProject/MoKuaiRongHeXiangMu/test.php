<?php
	// include("./lib/MysqliDb.php");
	// $db = new MysqliDb('localhost', 'root', 'yyh', 'test');
	// $data = Array ('createAt' =>$db->now(),'id'=>4);
	// // $id = $db->insert ('sqli', $data);
	
	// $updateColumns = Array ("createAt");
	// $lastInsertId = "id";
	// $db->onDuplicate($updateColumns, $lastInsertId);
	// $id = $db->insert ('sqli', $data);
	// 
	echo dirname(__FILE__);
	echo "<br/>";
	echo  $_SERVER['DOCUMENT_ROOT'];
	echo "<br/>";

	echo chdir(dirname(__FILE__));
?>