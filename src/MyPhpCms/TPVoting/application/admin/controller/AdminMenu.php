<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
use app\admin\common\Tree;

use app\admin\common\Auth;

class AdminMenu extends Base {
	public function Index(){
		
		$result=Db::table("think_admin_menus")->order(["sort_id" => "asc", 'menu_id' => 'asc'])->column('*', 'menu_id');
		$tree=new Tree();
		foreach ($result as $k => $v) {
			$result[$k]['level'] = $tree->get_level($v['menu_id'], $result);
		}


		print_r($result);
		
		
	}
}

?>