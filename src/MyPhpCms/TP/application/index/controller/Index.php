<?php
	namespace app\index\controller;
	use think\Controller;
	use think\Config;
	use think\Route;
	use think\Request;
	use think\View;
	use think\Db;

	




	

	


	

	
	class Index extends Controller{
		public function index(){
			
			$auth = new \think\Auth();  
       		print_r($auth);
			
		}

		
	}

?>