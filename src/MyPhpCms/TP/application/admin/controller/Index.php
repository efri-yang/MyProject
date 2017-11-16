<?php
	namespace app\admin\controller;

	use app\common\controller\Index as commonIndex;
	use think\Config;
	class Index{
		public function index(){
			// // echo "<h1>admin——>Index控制器——>index方法</h1>";
			// $config=[
			// 	"username"=>"application——admin——controller——yyh"
			// ];
			return "admin-index";
		}
		public function demo(){
			return  "asdfsadfasdf——DEMO";
		}
		 public function common(){
			$common=new commonIndex();
			return $common->index();
		}

	}

?>