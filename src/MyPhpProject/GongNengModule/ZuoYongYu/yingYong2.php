<?php
	function test(&$a){ 
	    $a=$a+100; 
	} 
	$b=1;

	echo $b."<br/>"; //1
	test($b);
	echo $b."<br/>";// 101
	$b=10;
	echo $b; //10
?>