<?php
namespace app\admin\controller;
use app\admin\common\Auth;
use app\admin\model\AuthUser;
use think\Controller;
use think\Loader;
use think\Request;
use think\Validate;

class Login extends controller {
    public function index() {
        return $this->fetch();
    }

    public function login() {
        $request = Request::instance();
        $params = $request->param();
        $params["password"] = md5($params["password"]);
        $validate = Loader::validate("UserLogin");

        if (!$validate->check($params)) {
            $this->error($validate->getError(), "login/index");
        } else {
            //验证通过以后，就需要判断用户名或者密码是否正确！！！
            $authUser = new AuthUser;
            //DB操作返回是数组。模型直接操作返回是对象
            $user = $authUser::get(["email" => $params["email"], "password" => $params["password"]]);
            //判断用户是否存在，存在判断是否已被禁用
            if (!!$user->id) {
                //获取数据对象原始数据:getData()
                //判断用户是否
                if ($user->status != 1) {
                    $this->error("账户被冻结", "login/index");
                }
                //判断是否需要记住账号和密码(没有选中checkbox的时候是不在的)，记住账号和密码 那么就需要cookie 存在本地

                if (@$params["remember"] == 1) {
                    Auth::login($user["id"], $user["username"], true);
                } else {
                    Auth::login($user["id"], $user["username"], false);
                }
                $this->success("登录成功！", "index/index");
            } else {
                //用户不存在
                $this->error("用户名或者密码错误！", "login/index");
            }
        }
    }
}
?>