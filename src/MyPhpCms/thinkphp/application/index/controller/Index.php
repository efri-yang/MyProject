<?php
	namespace app\index\controller;
	use think\Config;
	class Index{
		
		public function index(){
			$res=Config();

			dump($res);
			
		}


	}
?>