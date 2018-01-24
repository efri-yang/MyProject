<?php
	namespace yyhname2;
	require("namespace-1.php");
	use yyhname1\foo;

	class foo1{
		public function __construct(){
			echo "yyhname2_____construct";
		}
		static function staticmethod(){
			echo "yyhname2——staticmethod"."<br/>";
		}
	}
	
	
	// yyhname1\foo(); 报错啦！因为这样子相当于 调用了 yyhname2\yyhname1\foo() 显然是失败的

	// new namespace\foo;
	//new foo(); //两个的效果是一致的
	

	new foo();
	

?>