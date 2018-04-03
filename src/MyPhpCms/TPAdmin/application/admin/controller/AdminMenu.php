<?php
namespace app\admin\controller;
use think\Controller;

class AdminMenu extends Base{
	public function index(){
		return $this->fetch();
	}
}
?>