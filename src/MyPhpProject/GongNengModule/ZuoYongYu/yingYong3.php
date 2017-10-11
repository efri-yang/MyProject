<?php
	$var1 = 1;
	$var2 = 2;
 	function test(){
    	global $var1,$var2;
    	$var1 = &$var2;
    	echo "test-var1：".$var1."<br/>";
    	echo "test-var2：".$var2."<br/>";
 	}
 	test();
 	echo "外部：".$var1
?>