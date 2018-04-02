<?php
namespace app\admin\Controller;
//很多页面需要继承Base.php
//判断是否登录
//是否是超级管理员
//判断权限
use app\admin\common\Auth;
use app\admin\model\AuthUser;
use think\Controller;
use think\Loader;
use think\Request;
use think\Session;

class Base extends Controller {
    protected $request, $param, $module, $controller, $action, $urlMCA, $webData;
    public function __construct() {
        $this->request = Request::instance();
        //请求参数
        $this->param = $this->request->param();

        $this->module = $this->request->module();
        $this->controller = $this->request->controller();
        $this->action = $this->request->action();

        $this->urlMCA = $this->module . "/" . Loader::parseName($this->controller) . "/" . $this->action;

        parent::__construct();

    }
    public function _initialize() {
        $auth = new Auth();
        if ($auth->isLogin()) {
            $uid = Session::get('user.user_id');
            if ($uid != 1) {
                //不是超级管理员，需要检查权限，url(处理 模块+控制器+方法+参数的处理)
                if (!$auth->check($this->urlMCA, $uid)) {
                    //提示错误的信息，并叫他联系管路员
                    $this->error("用户权限不存在！", "login/index");
                }
            }
            //获取用户的信息
            $this->webData["userinfo"] = $this->getUserInfo($uid);

            //获取左侧菜单的信息

            $this->webData["sidemenu"] = $this->getSideMenuInfo($uid);
            //获取面包导航的信息

            //获取页面的标题
            //
            //

        } else {
            //没登录跳转到登录页面，跟上url
            $this->redirect('login/index', ['uri' => $this->urlMCA]);
        }
    }

    protected function getUserInfo($uid) {
        $userInfo = AuthUser::get($uid);
        return $userInfo;
    }

    protected function getSideMenuInfo($uid) {
        //去调用admin_menus当中
        $auth = new Auth();

    }
}

?>