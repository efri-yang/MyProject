<?php
	use app\mvc\view\home\Index;
	include 'SplLoader.php'; // 引入加载器
	spl_autoload_register('Loader::autoload'); // 注册自动加载


	new Index();
	
?>