<?php
	$var1 = 1;
	$var2 = 2;
 	function test_global(){    
    	global $var1,$var2;    
    	$var1=&$var2;    
    	$var1=7;
    	echo "test-var1：".$var1."<br/>";
    	echo "test-var2：".$var2."<br/>";    
 	}
 	test_global();    
	echo $var1; //1   
	echo $var2; //7

	/**
	 * 为什么是1和7
	 * test_global 作用域是仅限于函数内使用，有了global 以后 指针指向外部的var1，var2，
	 * 这个时候 $var1=&$var2;  var1 引用var2 ,说明var1指针指向了var2，不在指向外部的var1; 这个时候改变var1 的值 只会改变var2的值
	 */


?>