<?php
namespace app\admin\controller;
use app\admin\common\Auth;
use think\Controller;
use think\Request;

class AdminMenu extends Base {
	public function del() {
		$request = Request::instance();
		$auth = new Auth();

		//当前模块/默认视图目录/当前控制器（ 小写） /当前操作（ 小写） .html
		// return $this->fetch();
	}
}

?>