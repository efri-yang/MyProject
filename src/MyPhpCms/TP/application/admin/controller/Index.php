<?php
namespace app\admin\controller;
use think\Request;
use think\View;
use think\Controller;
	class Index extends Controller{
		public function index(){
			$this->assign("title","视频中心");			

			return $this->fetch();
		}
	}

?>