<?php
	require 'namespce1.php';

	\think\Loader::register();


	//register 中定义了自动加载类的机制
	//new 的时候就是去找文件，然后把文件包含进来
	new Person();
?>