<?php
namespace app\admin\controller;
use think\Request;
use think\View;
use think\Controller;
	class Index extends Controller{
		public function index(){
			$this->assign("title","page Index");
			return $this->fetch("index");
		}
	}

?>