<?php
	namespace app\index\controller;
	use think\Controller;
	use think\Config;
	
	use app\index\model\Usercopy;

	

	
	class Copy1 extends Controller{
		public function index(){
			// $user=new Usercopy();
			// $res=$user->where("uid",1)->select();
			// $res=Usercopy::destroy(11);
			// $res=Usercopy::destroy(function($query){
			// 	$query->where("uid",10);
			// });
			// $res=Usercopy::scope(function($query){
			// 			$query->where('age','>',10)->limit(10);
			// 	})->select();
			// foreach ($res as $key => $value) {
			// 	dump($value->toArray());
			// }
			// Usercopy::event('before_insert', function ($user) {
			// 	if ($user->age != 1) {
			// 		return false;
			// 	}
			// });
			$user=new Usercopy();
			$user->data([
				'username' => 'thinkphpxxxx',
				'age' =>20
			]);
			$user->save();
			
			

		}		

		 
		 
	}

?>