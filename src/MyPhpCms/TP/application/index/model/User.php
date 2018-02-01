<?php
namespace app\index\model;
use think\Model;

class User extends Model{
	protected $autoWriteTimestamp =false;
	protected $resultSetType = 'collection';
	public function message(){
		//Message 是指模型的名称  message.php 这个模型文件名称
		return $this->hasMany('Message',"user_id")->field("id,content");
	}
}	
	
?>