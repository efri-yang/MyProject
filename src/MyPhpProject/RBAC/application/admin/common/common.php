<?php
	spl_autoload_register(function ($class_name) {
    	require_once ROOT_PATH."/application/admin/class/".$class_name . '.class.php';
	});
?>