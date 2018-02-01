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
			
			
			$this->fetch("index");
			
		}

		public function login(){
			return $this->fetch();
		}
	}

?>