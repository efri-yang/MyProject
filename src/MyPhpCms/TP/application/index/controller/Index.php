<?php
	namespace app\index\controller;
	use think\Controller;
	use think\Config;
	use think\Route;
	use think\Request;
	use think\View;
	use think\Db;

	use app\index\model\Usertest;


	


	

	
	class Index extends Controller{
		public function index(){
			
			$user=new Usertest();
			
			
// 			$user = Usertest::find(3);
// $user->username = 'THINKPHP';
// $user->save();
			
		}
		public function hello(){
			return "index模块下index控制器下的hello方法！";
		}	 
	}

?>