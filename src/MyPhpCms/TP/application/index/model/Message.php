<?php
	namespace app\index\model;
	use think\Model;

	class Message extends Model{
		protected $autoWriteTimestamp =false;

		public function user(){
			return $this->belongsTo("User");
		}
	}
?>