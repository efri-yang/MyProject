<?php
	namespace app\index\controller;
	use think\Controller;
	use think\Config;
	use think\Route;
	use think\Request;
	use think\View;
	use think\Db;

	




	




	

	


	

	
	class Base extends Controller{
		public function __construct(){
			echo "Base extends Controller  __construct"."<br/>";
			
		}
		public function _initialize(){
			echo "Base extends Controller _initialize"."<br/>";
		}
		
	}

?>