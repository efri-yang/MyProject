<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;

class Index extends Controller {
	public function index() {
		Session::get('uid');
		//当前模块/默认视图目录/当前控制器（ 小写） /当前操作（ 小写） .html
		return $this->fetch();
	}

}
