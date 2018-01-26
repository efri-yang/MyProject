<?php
	namespace app\index\controller;
	use think\Request;

	class Error{
		public function __construct(){
			echo "Error-construct"."<br/>";
		}
		public function index(Request $request){
			$cityName=$request->controller(); //获取控制器的名称
			return $this->city($cityName);
		}

		protected function city($name){
			return '当前城市'.$name;
		}
	}
?>