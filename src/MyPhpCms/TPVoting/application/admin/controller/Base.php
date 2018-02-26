<?php
namespace app\admin\controller;
use app\admin\common\Auth;
use think\Controller;
use think\Db;
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
				$this->webData["left_menu"] = $this->getLeftMenu();


			} else {
				//没登录直接跳转到登录页面、
				$this->redirect('login/index', ['uri' => $this->url]);
			}
		}
	}

	protected function getLeftMenu() {
		$auth = new Auth();
		$menu = $auth->getMenuList(Session::get('user.user_id'), 1);

		$parent_ids = array(0 => 0);

		$current_id = 1;
		foreach ($menu as $k => $v) {

			if ($v['url'] == $this->url) {
				$parent_ids = $this->getMenuParent($menu, $v['menu_id']);
				$current_id = $v['menu_id'];
				

			}
		}

	}

	protected function getMenuParent($arr, $myid, $parent_ids = array()) {
		$a = $newarr = array();
		if (is_array($arr)) {
			foreach ($arr as $id => $a) {
				if ($a['menu_id'] == $myid) {
					if ($a['parent_id'] != 0) {

						array_push($parent_ids, $a['parent_id']);
						$parent_ids = $this->getMenuParent($arr, $a['parent_id'], $parent_ids);
					}
				}
			}

		}
		return !empty($parent_ids) ? $parent_ids : false;
	}

	protected function getCurrentNav($arr, $myid, $parent_ids = array(), $current_nav = '') {
		$a = $newarr = array();
		if (is_array($arr)) {

		}
		return !empty([$parent_ids, $current_nav]) ? [$parent_ids, $current_nav] : false;
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
		return Db::table('think_admin_menus')->where(["url" => $this->url])->find();
	}

	
}
