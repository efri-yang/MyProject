<?php
	namespace app\index\controller;
	use think\Controller;
	use think\Config;
	class Index extends Controller{

		
		 public function index(){
		 	
			print_r(Config::get());
		 }

		 
	}

?>