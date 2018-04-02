<?php
namespace  app\admin\Controller;
	//很多页面需要继承Base.php
	//判断是否登录
		//是否是超级管理员
			//判断权限
use app\admin\common\Auth;


use think\Controller;
use think\Request;
use think\Session;

class Base extends Controller{
	protected $request,$params,$url;
	public function __construct(){
		$this->request=Request::instance();

		parent::__construct();
	}
	public function _initialize(){
		$auth=new Auth();
		if($auth->isLogin()){
			if(Session::get("user.user_id")!=1){
				//不是超级管理员，需要检查权限，url(处理 模块+控制器+方法+参数的处理) 
				
			}

			print_r($this->request->url());
		}else{
			$this->redirect('admin/login', ['uri' =>"当前url地址,方便登录后跳转到对应的页面"]);
		}
	}
}




?>