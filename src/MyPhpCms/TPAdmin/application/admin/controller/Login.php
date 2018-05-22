<?php
namespace app\admin\controller;
use app\admin\common\Auth;
use app\admin\model\AuthUser;
use think\captcha\Captcha;
use think\Controller;
use think\Loader;
use think\Request;
use think\Validate;

class Login extends controller {
    public function index() {

    }
    //验证码
    public function verify() {
        $config = [
            // 验证码字符集合
            'codeSet' => '0123456789',
            // 验证码字体大小(px)
            'fontSize' => 14,
            // 是否画混淆曲线
            'useCurve' => false,
            // 验证码图片高度
            'imageH' => 30,
            // 验证码图片宽度
            'imageW' => 100,
            //
            'fontttf' => '4.ttf',

            // 验证码位数
            'length' => 4,

            'useNoise' => true,

            // 验证成功后是否重置
            'reset' => true,
        ];
        $captcha = new Captcha($config);
        return $captcha->entry();
    }

    public function login() {
        echo "Asdfasdfasdf";
        if ($this->request->isPost()) {
            $request = Request::instance();
            $params = $request->param();
            $params["password"] = md5($params["password"]);
            $validate = Loader::validate("UserLogin");

            if (!$validate->check($params)) {
                $this->error($validate->getError(), "login/index");
            } else {
                //验证通过以后，就需要判断用户名或者密码是否正确！！！这里是模型
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
                    $redirect_uri = isset($this->param['uri']) ? $this->param['uri'] : 'admin/index/index';
                    $this->success("登录成功！", $redirect_uri);
                } else {
                    //用户不存在
                    $this->error("用户名或者密码错误！", "login/login");
                }
            }
        } else {
            echo "asdfasdf";
        }
        $this->assign([
            'url' => isset($this->param['uri']) ? $this->param['uri'] : '',
        ]);
        return $this->fetch("index");
    }

    public function loginOut() {
        if (Auth::loginOut()) {
            $this->success("成功退出！", "login/index");
        }
    }
}
?>