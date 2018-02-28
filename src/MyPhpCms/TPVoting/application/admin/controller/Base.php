<?php
namespace app\admin\controller;
use app\admin\common\Auth;
use app\admin\common\Tree;
use think\Controller;
use think\Request;
use think\Session;
use think\Url;
use think\Db;

class Base extends Controller {
    protected $request, $param, $module, $controller, $action, $url, $mcUrl, $requestType, $menuInfo, $webData;

    public function __construct() {
        $this->request = Request::instance();
        $this->param = $this->request->param();
        $this->module = $this->request->module();
        $this->controller = $this->request->controller();
        $this->action = $this->request->action();
        $this->url = $this->module . "/" . $this->parseName($this->controller) . "/" . $this->action;
        $this->mcUrl = $this->module . "/" . $this->parseName($this->controller) . "/";
        parent::__construct();

    }

    public function _initialize() {
        $auth = new Auth();
        if ($auth->isLogin()) {
            $userId = Session::get('user.user_id');
            if ($userId != 1) {
                if (!$auth->check($this->url, $userId)) {
                    $this->error("您没有权限,请联系管理员!");
                }
            }
            $this->webData["left_menu"] = $this->getLeftMenu($userId, 1);
            $this->webData["user_info"]=$this->getUserInfo($userId);

            print_r($this->webData["user_info"]);
        } else {
            //没有登录，重定向到登录页面，并且记录下页面 方便跳转
            $this->redirect("login/index", ["uri" => $this->url]);
        }

    }
    protected function getUserInfo($userId){
        $userInfo=Db::table('think_auth_user')->where('id',$userId)->find();
        return $userInfo;
    }
    //对于控制器进行转化，因为控制器SayAge 中class Sayage 那么在访问的时候 要用admin/say_age/
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

    protected function getLeftMenu($userId, $type) {
        $auth = new Auth();
        //获取指定用户的菜单列表
        $authMenu = $auth->getMenuList($userId, $type);

        $currentNavId = 1;
        $max_level = 0;
        $parentIds = array(0 => 0);
        foreach ($authMenu as $k => $v) {
            //遍历菜单列表，找到对应的url相等的那个菜单
            if ($v["url"] == $this->url) {
                $currentNavId = $v["menu_id"];
                $parentIds = $this->getMenuParentid($authMenu, $v["menu_id"]);
            }
        }
        if ($parentIds == false) {
            $parentIds = array(0 => 0);
        }
        $tree = new Tree();
        //展示菜单
        foreach ($authMenu as $k => $v) {
            $url = url($v['url']);
            $authMenu[$k]['level'] = $tree->get_level($v['menu_id'], $authMenu);
            $max_level = $max_level <= $authMenu[$k]['level'] ? $authMenu[$k]['level'] : $max_level;
            $authMenu[$k]['url'] = $url;
        }
        $tree->init($authMenu);

        $text_base_one = "<li class='treeview";
        $text_hover = " active";
        $text_base_two = "'><a href='javascript:void(0)'>\$title<span class='arrow'></span></a><ul class='treeview-menu";
        $text_open = " active";
        $text_base_three = "'>";

        $text_base_four = "<li";
        $text_hover_li = " class='active'";
        $text_base_five = "><a href='\$url'>\$title<span class='arrow'></span></a></li>";

        $text_0 = $text_base_one . $text_base_two . $text_base_three;
        $text_1 = $text_base_one . $text_hover . $text_base_two . $text_open . $text_base_three;
        $text_2 = "</ul></li>";
        $text_current = $text_base_four . $text_hover_li . $text_base_five;
        $text_other = $text_base_four . $text_base_five;
        for ($i = 0; $i <= $max_level; $i++) {
            $tree->text[$i]['0'] = $text_0;
            $tree->text[$i]['1'] = $text_1;
            $tree->text[$i]['2'] = $text_2;
        }

        $tree->text['current'] = $text_current;
        $tree->text['other'] = $text_other;
        return $tree->get_authTree(0, $currentNavId, $parentIds);

    }

    protected function getMenuParentid($authMenu, $childMenuId, $parentIds = array()) {
        foreach ($authMenu as $k => $v) {
            //当前菜单的parent==menu菜单中某个menu_id 的值就可以确认是 当前菜单的父菜单
            if ($v["menu_id"] == $childMenuId) {
                if ($v['parent_id'] != 0) {
                    array_push($parentIds, $v['parent_id']);
                    $parentIds = getMenuParentid($authMenu, $v["parent_id"], $parentIds);
                }

            }
        }
        return !empty($parentIds) ? $parentIds : false;
    }
    protected function fetch($template = '', $vars = [], $replace = [], $config = []) {
        parent::assign(['web_data' => $this->webData]);
        return parent::fetch($template, $vars, $replace, $config);
    }
    

}
