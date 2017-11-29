<?php
	namespace app\index\controller;

	use think\Controller;
	use think\View;
	use think\Request;
	use app\validate\User;

	//
	class Index extends Controller{
		 public function index(){
		 	return $this->fetch();
		 }

		 public function login(){
		 	$request = Request::instance();
		 	if($request->isPost()){
		 		$data = $request->param();
		 		$result = $this->validate($data, 'User.checklogin');
		 	}
		 }
	}

?>