<?php
namespace app\index\model;
use think\Model;

class User extends Model{
	protected $createTime = 'reg_time';
	


	// protected $autoWriteTimestamp = 'datetime';
	// public function getSexAttr($val){
	// 	switch($val){
	// 		case '1':
	// 			return "男";
	// 			break;
	// 		case '2':
	// 			return "女";
	// 			break;
	// 		default:
	// 			return "未知";
	// 	}
	// }
}	
	
?>