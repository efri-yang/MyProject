<?php
namespace app\admin\controller;
use app\admin\common\Auth;
use app\admin\common\Tree;
use think\Db;
use think\Request;
use think\Session;
use think\Validate;

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
        $rule = [
            'parent_id' => 'require',
            'title' => 'require',
            'url' => 'require',
            'sort_id' => 'require|number',

            'log_type', 'require',

        ];
        $message = [
            'parent_id' => '上级菜单不能为空',
            'title' => '标题不能为空',
            'url' => 'url不能为空',
            'sort_id' => '请输入排序id',
            'log_type' => '日志记录方式不能为空',
        ];

        $tree = new Tree();

        $result = Db::table("think_admin_menus")->order(["sort_id" => "asc", 'menu_id' => 'asc'])->column('*', 'menu_id');
        $optionList = $tree->getOptions(0, $result);
        $this->assign('optionList', $optionList);

        if ($this->request->isPost()) {

            //判断是否通过验证 验证通过就提示添加成功 然后跳转到index 如果失败
            $params = $this->request->param();

            $validate = new Validate($rules, $message);
            if (!$validate->check($params)) {
                $this->error($validate->getError(), "add");
            } else {
                echo "ASdfasdfasdfasdf";
            }

        }
        return $this->fetch("add");

    }

}
?>