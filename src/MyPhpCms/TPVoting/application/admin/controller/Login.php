<?php
namespace app\admin\controller;
use app\admin\common\Auth;
use app\admin\model\AuthUser;
use think\Controller;
use think\Loader;
use think\Request;
use think\Validate;

class Login extends Controller {
    public function index() {
        //当前模块/默认视图目录/当前控制器（ 小写） /当前操作（ 小写） .html
        return $this->fetch("login/login");
    }
    public function login() {
        $request = Request::instance();
        $params = $request->param();
        $params["password"] = md5($params["password"]);
        $validate = Loader::validate("UserLogin");
        if (!$validate->check($params)) {
            $this->error($validate->getError(), "login/index");
        } else {
            $authUser = new AuthUser;
            $user = $authUser::get(["email" => $params["email"], "password" => $params["password"]]);
            if (!!$user->id) {
                if ($user->getData('status') != 1) {
                    $this->error("账户被冻结", "login/index");
                }
                //记住我
                if (@$params['remember'] == 1) {
                    Auth::login($user->getData("id"), $user->getData("username"), true);2
                } else {
                    Auth::login($user->getData("id"), $user->getData("username"), false);
                }

                $this->success("登录成功！", "index/index");
            } else {
                $this->error("用户名或者密码错误！", "login/index");
            }

        }
    }

}
