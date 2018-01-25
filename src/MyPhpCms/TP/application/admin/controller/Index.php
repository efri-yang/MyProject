<?php
	namespace app\admin\controller;
	use think\Controller;
	class Index extends Controller{
		public function index(){
			$data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
			return ['data'=>$data,'code'=>1,'message'=>'操作完成'];
		}
	}

?>