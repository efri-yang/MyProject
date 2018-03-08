<?php
namespace app\admin\controller;
use app\admin\common\Auth;
use app\admin\common\Tree;
use think\Controller;
use think\Db;
use think\Request;

class AdminMenu extends Base {
    public function Index() {
        $log_types = [
            0 => '不记录',
            1 => 'GET',
            2 => 'POST',
            3 => 'PUT',
            4 => 'DELETE',
        ];
        $result = Db::table("think_admin_menus")->order(["sort_id" => "asc", 'menu_id' => 'asc'])->column('*', 'menu_id');
        $tree = new Tree();
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        foreach ($result as $k => $v) {
            $result[$k]['level'] = $tree->get_level($v['menu_id'], $result);
            $result[$k]['manage'] = '<a class="layui-btn layui-btn-danger" href="" onclick="del(' . $v['menu_id'] . ')">删除</a>';
            $result[$k]['manage'] .= '<a class="layui-btn" href="' . url($this->mcUrl . 'edit', 'id=' . $v['menu_id']) . '">编辑</a>';
            $result[$k]['is_show'] = $v['is_show'] == 1 ? "显示" : "隐藏";
            $result[$k]['log_type'] = $log_types[$v['log_type']];
        }
        $str = "<tr>
                <td class='align-c'>\$menu_id</td>
                <td  class='align-c'>\$spacer  \$title</td>
                <td>\$url</td>
                <td  class='align-c'>\$parent_id</td>

                <td  class='align-c'>\$sort_id</td>
               <td  class='align-c'>\$is_show</td>
               <td  class='align-c'>\$log_type</td>
                <td  class='align-c'>\$manage</td>
            </tr>";
        $tree->init($result);
        $menu_list = $tree->get_tree(0, $str);

        $this->assign([
            'menu_list' => $menu_list,
        ]);
        return $this->fetch();

    }
}

?>