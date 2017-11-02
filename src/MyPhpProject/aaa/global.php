<?php
    //include 的时候用的
	define('ROOT_PATH',dirname(__FILE__));//直接定死了
	// define('STATIC_PATH',dirname($_SERVER['PHP_SELF'])); //这种方式是错误的
	define('STATIC_PATH',substr($_SERVER['PHP_SELF'],0,strpos($_SERVER['PHP_SELF'],"aaa"))."aaa");



	
	// // $basepath=substr($_SERVER['PHP_SELF'],0,strpos($_SERVER['PHP_SELF'],"aaa")); //直接定死了

	// $PHP_SELF=$_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
	// $url='http://'.$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strrpos($PHP_SELF, '/')+1); //跟着调用的文件而改变

 



 
?>