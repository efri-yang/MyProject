<?php
	namespace os;

	class SplAutoload1{
		function __construct(){
			echo '<h1>' . __CLASS__ . '</h1>';
		}

		public static function run(){
			echo "os-run 方法！";
		}
	}

?>