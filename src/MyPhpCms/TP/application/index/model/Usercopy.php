<?php
	namespace app\index\model;
	use think\Model;
	class Usercopy extends Model{
		protected $resultSetType = 'collection';
		protected $autoWriteTimestamp = false;
		protected function scopeThinkphp($query){
			$query->where('username','thinkphp')->field("uid,username");
		}
		protected function scopeAge($query){
			$query->where("age",">",10);
		}
		
	}

	
?>