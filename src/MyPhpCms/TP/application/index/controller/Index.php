<?php
	namespace app\index\controller;
	use think\Controller;
	use think\Config;
	use think\Route;
	use think\Request;
	use think\View;


	

	
	class Index extends Controller{
		public function index(){
			$event = controller('Blog', 'event');
			echo $event->insert();

		}
		
		
		 
		 
	}

?>