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
			
			Db::table('think_user')->chunk(2, function($users) {
				print_r($users);
			});
			
			
		}
		public function hello(){
			return "index模块下index控制器下的hello方法！";
		}	 
	}

?>