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
use think\Loader;

class Base extends Controller{
	protected $request,$param,$module,$controller,$action,$urlMCA;
	public function __construct(){
		$this->request=Request::instance();
		//请求参数
		$this->param=$this->request->param();

		$this->module=$this->request->module();
		$this->controller=$this->request->controller();
		$this->action=$this->request->action();

		$this->urlMCA=$this->module . "/" . Loader::parseName($this->controller) . "/" . $this->action;
		parent::__construct();
	}
	public function _initialize(){
		$auth=new Auth();
		if($auth->isLogin()){
			$uid = Session::get('user.user_id');
			if($uid !=1){
				//不是超级管理员，需要检查权限，url(处理 模块+控制器+方法+参数的处理) 
				if($auth->check($this->urlMCA,$uid)){
					echo "ASdfasdfasdfasdfa";
				}else{
					echo "ASdfasdfc";
				}
				
			}

			
		}else{
			$this->redirect('admin/login', ['uri' =>"当前url地址,方便登录后跳转到对应的页面"]);
		}
	}
}




?>