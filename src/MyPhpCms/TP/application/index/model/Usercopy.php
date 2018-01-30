<?php
	namespace app\index\model;
	use think\Model;
	class Usercopy extends Model{
		// protected $resultSetType = 'collection';
		protected $autoWriteTimestamp = false;
		protected static function init(){
			User::event('before_insert', function ($user) {
				if ($user->status != 1) {
					return false;
				}
			});
		}	
		

	}
?>