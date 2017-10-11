<?php
	// function test1(){
	// 	global $v1,$v2;
	// 	$v2=&$v1;
	// }

	// function test2(){
	// 	$GLOBALS['v3'] =& $GLOBALS['v1']; 
	// }

	// $v1 = 1; 
	// $v2 = $v3 = 0; 

	// test1(); 
	// // echo $v1 ."\n"; 
	// // echo $v2 ."\n";
	// test2(); 
	// // echo $v3 ."\n"; 
	// 
	// function test() { 
	//     $GLOBALS['a']; 
	//     unset($a); 
	// } 
	// $a = 1; 
	// test(); 
	// echo $a;
	// 
	// 
	// 
	$a=10;
	$b=30;

	function test(){
		global $a,$b;
		$a=&$b;

		echo $a;
	}
	test();

	echo $a;
	
?>