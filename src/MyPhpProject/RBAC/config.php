<?php
	session_start();
    //其他文件引用这个文件，APP_ROOT 都是固定不变的，被引用后 输出的还是config.php 所在文件夹
	define('ROOT_PATH',dirname(__FILE__));//直接定死了
	// define('STATIC_PATH',dirname($_SERVER['PHP_SELF'])); //这种方式是错误的
	define('STATIC_PATH',substr($_SERVER['PHP_SELF'],0,strpos($_SERVER['PHP_SELF'],"RBAC"))."RBAC");

	include(ROOT_PATH."/conn.php");
?>