<?php
namespace app\admin\controller;
use app\admin\model\AuthUser;
use think\Controller;
use think\Loader;
use think\Request;
use think\Session;
use think\Validate;

class Login extends Controller {
	public function index() {
		//当前模块/默认视图目录/当前控制器（ 小写） /当前操作（ 小写） .html
		return $this->fetch("login");
	}
	public function createUser() {
		$request = Request::instance();
		$data = $request->param();
		$data["password"] = md5($data["password"]);
		$validate = Loader::validate("UserLogin");
		if (!$validate->check($data)) {
			$this->error($validate->getError(), "login/index");
		} else {
			$authUser = new AuthUser;
			$user = $authUser::get(["email" => $data["email"], "password" => $data["password"]]);
			if (!!$user->id) {
				Session::set('uid', $user->id);
				$this->success("登录成功！", "index/index");
			} else {
				$this->error("用户名或者密码错误！", "login/index");
			}

		}
	}

}
