<?php
	namespace app\admin\controller;

	class Index {
		public function index(){
			dump(config());
			// return "这是app(应用目录)-》admin(模块)-Index(控制器)-》index(index的方法)";
		}
	}
?>