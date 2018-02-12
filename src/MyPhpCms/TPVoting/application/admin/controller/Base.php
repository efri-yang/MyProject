<?php
namespace app\admin\controller;
use app\admin\common\Auth;
use think\Controller;
use think\Request;
use think\Session;
use think\Url;

class Base extends Controller {
	protected $request, $param, $module, $controller, $action, $url,$mcUrl,$requestType, $menuInfo, $webData;

	public function __construct() {
		$this->request = Request::instance();
		$this->param = $this->request->param();
		$this->module = $this->request->module();
		$this->controller = $this->request->controller();
		$this->action = $this->request->action();
		$this->url = $this->module . "/" . $this->parseName($this->controller) . "/" . $this->action;
		$this->mcUrl=$this->module . "/" . $this->parseName($this->controller) . "/";
		parent::__construct();

	}

	public function _initialize() {
		$auth = new Auth();
		if ($this->request->isAjax()) {

		} else {

			if ($auth->isLogin()) {
				$userId = Session::get('user.user_id');
				//不是超级管理员
				if ($userId != 1) {
					if (!$auth->check($this->url, $userId)) {
						//抛出没有授权的异常
						$this->error('您没有权限,请联系管理员！');
					}
				}
				$this->webData["mc_url"]=$this->mcUrl;
				$this->webData["left_menu"]=$this->getLeftMenu();


				//获取信息保存在某个地方
				$menuInfo = $this->getMenuInfo();


			} else {
				//没登录直接跳转到登录页面、
				$this->redirect('login/index', ['uri' => $this->url]);
			}
		}
	}

	protected function parseName($name, $type = 0, $ucfirst = true) {
		if ($type) {
			$name = preg_replace_callback('/_([a-zA-Z])/', function ($match) {
				return strtoupper($match[1]);
			}, $name);
			return $ucfirst ? ucfirst($name) : lcfirst($name);
		} else {
			return strtolower(trim(preg_replace("/[A-Z]/", "_\\0", $name), "_"));
		}
	}

	protected function getMenuInfo() {
		return Db::table('think_admin_menu')->where(["url" => $this->url])->find();
	}

	protected function getLeftMenu() {
		$auth = new Auth();
		//(array) $type 就是将type转化成数组类型
		$t = implode(',', (array) $type);
	}

}
