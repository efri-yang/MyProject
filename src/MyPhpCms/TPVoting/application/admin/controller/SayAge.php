<?php
namespace app\admin\controller;
use app\admin\common\Auth;
use think\Controller;
use think\exception\HttpResponseException;
use think\Request;

class SayAge extends Controller {
	public function index() {
		$request = Request::instance();
		$api_result = [
			'status' => 404,
			'extend' => [],
			'result' => [],
			'message' => '',
			'timestamp' => time(),
		];

		throw new HttpResponseException({"age":24});

		$auth = new Auth();

		//当前模块/默认视图目录/当前控制器（ 小写） /当前操作（ 小写） .html
		// echo url('index/blog/read', ['id' => 5, 'name' => 'thinkphp']);

	}

}
