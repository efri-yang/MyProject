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
			
			// return $this->fetch("index",["name"=>"yyh00001","email"=>"948061564@qq.com","__PUBLIC__"=>"ASDFASDFASDF"]);
			
			return $this->fetch("index",["title"=>"网站头部","wbtitle"=>"网站头部1111"]);
		}

		public function login(){
			return $this->fetch();
		}
	}

?>