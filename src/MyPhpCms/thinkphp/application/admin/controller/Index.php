<?php
	namespace app\admin\controller;

	use app\common\controller\Index as commonIndex;
	
	class Index{
		public function index(){
			echo "<h1>admin——>Index控制器——>index方法</h1>";
		}
		 public function common(){
			$common=new commonIndex();
			return $common->index();
		}

	}

?>