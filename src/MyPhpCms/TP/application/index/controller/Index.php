<?php
	namespace app\index\controller;
	use think\Controller;
	use think\Config;
	use think\Route;
	use think\Request;
	use think\View;
	use think\Db;
	use think\Loader;

	




	




	

	


	

	
	class Index extends Base{
		
		public function _initialize(){
			echo "Index extends Base _initialize"."<br/>";
		}
		public function index(){
			
			$Auth =new \auth\Auth(); 
			

		// 	$Request=Request::instance();
		// 	$module=$Request->module();
		// 	$controller=$Request->controller();
		// 	$action=$Request->action();
		$name="admin/index/index";
		  //当前用户id
		  $uid = '1';
		  //分类
		  $type = "1";
		  //执行check的模式
		  $mode = 'url';
		  //'or' 表示满足任一条规则即通过验证;
		  //'and'则表示需满足所有规则才能通过验证
		  $relation = 'and';
		  // if ($Auth->check($name, $uid, $type, $mode, $relation)) {
		  //  die('认证：成功');
		  // } else {
		  //  die('认证：失败');
		  // }
		  print_r($Auth->getGroups(1));
       		
			
		}


		public function test(){
			
		}

		
	}

?>