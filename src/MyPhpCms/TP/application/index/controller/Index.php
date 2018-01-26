<?php
	namespace app\index\controller;
	use think\Controller;
	use think\Config;
	use think\Route;
	use think\Request;
	use think\View;

	
	class Index extends Controller{
		protected $beforeActionList=[
			'first',
			'second'=>['except'=>'hello'],
			'three' => ['only'=>'hello,data']

			//TP/public/index/index/hello  就是 先执行first 方法  
			//然后'three' => ['only'=>'hello,data'] 表示 执行hello或者data 的前 先执行 three 
		];
		
		public function index(){
	 		$this->assign("myname","yyh");
	 		return $this->fetch('index');	 
		}
		protected function first(){
			echo 'first<br/>';
		}
		protected function second(){
			echo 'second<br/>';
		}
		public function three(){
				echo 'three<br/>';
		}


		public function hello(){
			return 'hello';
		}
		public function data(){
			
			return 'data';
		}


		 
		 
	}

?>