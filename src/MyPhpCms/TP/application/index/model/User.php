<?php
namespace app\index\model;
use think\Model;

class User extends Model{
	
	
	protected $createTime = 'reg_time';

	// public function getStatusAttr($value)
	// 	{
	// 	$status = [-1=>'删除',0=>'禁用',1=>'正常',2=>'待审核'];
	// 	return $status[$value];
	// 	}	

	public function setUserNameAttr($value){
		echo "<p>啊撒旦法撒旦法撒地方</p>";
		return strtolower($value);
	}


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