<?php

	// echo dirname(realpath('G:/xampp/htdocs/MyProject/src/MyPhpCms/TP/public'));
	// echo pathinfo("index", PATHINFO_FILENAME);
	define('DS', DIRECTORY_SEPARATOR);  //http://blog.csdn.net/wjc19911118/article/details/12943487
	defined('APP_PATH') or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . DS);
    defined('ROOT_PATH') or define('ROOT_PATH', dirname(realpath(APP_PATH)) . DS);
	//EXTEND_PATH=G:\xampp\htdocs\MyProject\src\MyPhpCms\TP\extend\   扩展类库目录
	defined('EXTEND_PATH') or define('EXTEND_PATH', ROOT_PATH . 'extend' . DS);
	echo EXTEND_PATH;
	echo rtrim(EXTEND_PATH, DS);
?>