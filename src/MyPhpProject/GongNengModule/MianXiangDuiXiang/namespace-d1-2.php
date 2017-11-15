<?php
	namespace Newer;
	require_once './namespace-d1-1.php';
	//new Person();      //报错，找不到Person; 调用的是当前命名空间下的Person
	
	new \Person(); //这个是正确的，使用的了完全限定名称调用完全限定名称 

?>