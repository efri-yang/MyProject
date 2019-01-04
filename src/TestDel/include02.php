<?php

  class include02{
  	
  	public static function register(){
  		spl_autoload_register(function ($class) {
		    include $class . '.php';
		});
  	}
  	public static $age=29;
  }
?>