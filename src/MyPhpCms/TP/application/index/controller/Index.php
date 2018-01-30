<?php
	namespace app\index\controller;
	use think\Controller;
	use think\Config;
	use think\Route;
	use think\Request;
	use think\View;
	use think\Db;

	use app\index\model\User;
	use app\index\model\Message;


	


	

	
	class Index extends Controller{
		public function index(){
			$user = User::get(13);
			$res=$user->message()->select();
			//message 要加括号！！！！
			dump(collection($res)->toArray());
			//输出array(array(),array())	
		}
	}

?>