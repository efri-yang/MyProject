<?php
	$a="ABC"; 
	$b =&$a; 
	echo $a;//这里输出:ABC 
	echo $b;//这里输出:ABC 
	$b="EFG";
	$a="xxx"; 
	echo $a;//这里输出xxx
	echo $b;//这里输出xxx


	/**
	 * 例子说明了 引用变量指向的是同一个内容
	 */
?>