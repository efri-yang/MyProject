<?php
	namespace app\index\controller;
	use think\Controller;
	use think\Config;
	use think\Route;
	use think\Request;
	use think\View;

	use app\index\user;


	

	
	class Index extends Controller{
		public function index($id=10){
			$request = Request::instance();
			dump($request->only("id"));
			

		}

		public function hello(){
			return "index模块下index控制器下的hello方法！";
		}
		
		
		 
		 
	}

?>