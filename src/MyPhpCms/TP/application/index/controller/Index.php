<?php
	namespace app\index\controller;

	use think\Controller;
	use think\View;
	use think\Loader;
	use think\Request;
	// use think\Validate;
	// use think\Validate;
	use app\index\validate\User;
	use think\Db;
	use app\index\model\User as ModelUser;


	//
	class Index extends Controller{

		
		 public function index(){
		 	
			$Test = new \my\Test();
			$Test->sayHello();
		 }

		  public function login(){
		 	return $this->fetch();
		 }

		 public function checklogin(){
		 	$request = Request::instance();
		 	if($request->isPost()){
		 		$data = $request->param();
		 		
		 		
				$result = $this->validate($data,"User");
					if(true !== $result){
					    $this->error($result);
					}else{
						$data["password"]=md5($data["password"]);
						$user=Db::table("user")->where($data)->find();
						if(empty($user)){
							$this->error("用户不存在！");	
						}else{
							 $this->success('登录成功', 'index/index/index');
						}
					}

		 	}
		 }
	}

?>