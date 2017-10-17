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
	class A{
		public static function who(){
			echo __CLASS__;
		}
		public static function test(){
			static::who();
		}
	}

	class B extends A{
		Public static function who(){
			echo __CLASS__;
		}
	}

	B::test();
?>