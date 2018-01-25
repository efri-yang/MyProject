<?php
	spl_autoload_register(function($class){
		$class_map = array(
	        // 限定类名 => 文件路径
	        'os\\SplAutoload1' => './SplAutoload1.php'
	    );

	    $file = $class_map[$class];
	    if (file_exists($file)) {
	        include $file;
	    }
	});

	os\SplAutoload1::run();	
?>