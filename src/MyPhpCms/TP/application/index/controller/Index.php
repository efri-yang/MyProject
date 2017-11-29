<?php
	namespace app\index\controller;

	use think\Controller;
	use think\View;
	use think\Loader;
	use think\Request;
	// use think\Validate;
	// use think\Validate;
	use app\index\validate\User;


	//
	class Index extends Controller{

		
		 public function index(){
		 	return $this->fetch();
		 }

		 public function login(){
		 	$request = Request::instance();
		 	if($request->isPost()){
		 		$data = $request->param();
		 		// print_r($data);
		 	// 	$validate = new Validate([
				//     'username|用户名' => 'require|alphaNum', //是否为字母和数字
				//     'password|密码' => 'require|length:6,20',

				// ],[
			 //        'username.require' => '请输入用户名',
			 //        'username.alphaNum' => '用户名不合法',
			 //        'password.require' => '密码不能为空',
			 //        'password.length' => '密码长度6-20位',
			 //    ]);
				// if(!$validate->check($data)){
    // 				dump($validate->getError());
				// }
					$result = $this->validate($data,'User.checklogin');
					print_r($result);
					if(true !== $result){
					    dump($result);
					}

		 	}
		 }
	}

?>