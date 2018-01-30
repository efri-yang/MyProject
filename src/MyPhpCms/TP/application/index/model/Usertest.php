<?php
	namespace app\index\model;
	use think\Model;
	class Usertcopy extends Model{
		protected $autoWriteTimestamp = false;
		
	}

	// class Usertest extends Model{
	// 	protected $autoWriteTimestamp = false;
	// 	protected $auto = [];
	// 	protected $insert = ['age'=> 1,'ip'];
	// 	protected $update = ['delete_time'];

	// 	protected function setIpAttr(){
	// 		echo "setIpAttr"."<br/>";
	// 		return request()->ip();
	// 	}
	// 	protected function setDeleteTimeAttr(){
	// 		echo "setDeleteTimeAttr"."<br/>";
	// 		return time();
	// 	}
		
	// }
?>