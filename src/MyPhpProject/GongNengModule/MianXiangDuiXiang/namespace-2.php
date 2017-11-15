<?php
	namespace yyhname2;
	include 'namespace-1.php';

	const FOO=2;
	function foo(){
		echo "yyhname2——foo"."<br/>";
	}

	class foo{
		static function staticmethod(){
			echo "yyhname2——staticmethod"."<br/>";
		}
	}
	
	// yyhname1\foo(); 报错啦！因为这样子相当于 调用了 yyhname2\yyhname1\foo() 显然是失败的

	\yyhname1\foo();
	\yyhname2\foo();
	

?>