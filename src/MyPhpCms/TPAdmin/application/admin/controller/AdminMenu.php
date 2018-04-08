<?php
namespace app\admin\controller;
use app\admin\common\Auth;
use app\admin\common\Tree;
use think\Db;
use think\Session;

class AdminMenu extends Base {
    public function index() {
        //column( '字段列表', '数组键名'  )
        //获取menus 中的的所有数据
        $tree = new Tree();

        $result = Db::table("think_admin_menus")->order(["sort_id" => "asc", 'menu_id' => 'asc'])->column('*', 'menu_id');
        $menuList = $tree->getMenu(0, $result);
        $this->assign('menuadmin', $menuList);
        return $this->fetch();
    }

    public function add() {

        return $this->fetch("add");
    }

}
?>