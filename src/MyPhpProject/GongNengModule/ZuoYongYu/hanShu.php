 <?php 
	/**
	 *例子1
	 *getValA中这里是取不到A的值得，说明了一般情况下函数是无法取得外部的作用于的
	 */
	// $A=10;
	// function getValA(){
	// 	echo $A;
	// }
	// getValA(); 

	/**
	 * 例子2
	 * getValA中这里是可以A的值得，函数内容global 改变了变量作用于域,可以理解为一个指针指向了$A
	 */
	// $A=10;
	// function getValA(){
	// 	global $A;
	// 	echo $A;
	// }
	// getValA(); 



	/**
	 * 例子2
	 * getValA中这里是可以A的值得，函数内容global 改变了变量作用于域,getValB 没有指针指向$A 所以取不到 
	 */

	// $A=10;
	// function getValA(){
	// 	global $A;
	// 	echo $A;
	// }

	// function getValB(){
	// 	echo $A;
	// }
	// getValA(); 
	// getValB(); 



	function test1() { 
    global $v1, $v2; 
    $v2 =& $v1; 
} 
function test2() { 
    $GLOBALS['v3'] =& $GLOBALS['v1']; 
} 
$v1 = 1; 
$v2 = $v3 = 0; 
test1(); 
echo $v1 ."\n"; 
echo $v2 ."\n"; 
// test2(); 
// echo $v3 ."\n";






 ?>




