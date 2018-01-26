<?php
	namespace app\index\controller;
	use think\Request;

	class Error{
		public function index(Request $request){
			$cityName=$request->controller();
			return $this->city($cityName);
		}

		protected function city($name){
			return '当前城市'.$name;
		}
	}
?>