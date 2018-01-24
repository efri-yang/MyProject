<?php
	namespace think;

	class Loader{
		public static function autoload($class){
			echo "Loader-autoload"."<br/>";
		}
		public static function register($autoload = ''){
			echo "Loader-register"."<br/>";
			spl_autoload_register($autoload ?: 'think\\Loader::autoload', true, true);
		}
	}
?>