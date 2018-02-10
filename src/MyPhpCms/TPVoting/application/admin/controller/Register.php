<?php
namespace app\admin\controller;

use think\Controller;
use think\View;
use think\Request;
use  think\Loader;
use think\Validate;

use app\admin\model\AuthUser;

//  登录 和注册 不需要判断用户是否登录
class Register extends Controller
{
    public function index()
    {	
    	//当前模块/默认视图目录/当前控制器（ 小写） /当前操作（ 小写） .html
        return $this->fetch("register");
    }
    //用户注册提交到这个方法
    public function register(){
    	$request = Request::instance();

    	$data=$request->param();

        //密码md5加密
        $data["password"]=md5($data["password"]);
        // $rule=[
        //     'username' => 'require|max:5',
        //     'email' => 'require|email',
        //     'password' => 'require|min:6'
        // ];
        // $msg = [
        //     'username.require' => '用户名不能为空',
        //     'username.max' => '名称最多不能超过5个字符',
        //     'email.require' => '邮箱不能为空',
        //     'email.email' => '请输入正确的邮箱',
        //     'password.require' => '密码不能为空',
        //     'password.min' => '密码的长度不能小于6位数'
        // ];
        // $validate = new Validate($rule,$msg);
        $validate =Loader::validate("UserRegister");
		if (!$validate->check($data)) {
            $this->error($validate->getError(),"register/index");
		}else{
            $authUser = new AuthUser;
            $authUser->data($data);
            $authUser->save();
            if(!!$authUser->id){
                $this->success("注册成功！","login/index");    
            }else{
                $this->success("注册失败！","index/index");
            }
        }

    }
   
}
