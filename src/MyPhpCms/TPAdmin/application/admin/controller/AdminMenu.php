<?php
namespace app\admin\controller;
use app\admin\common\Auth;
use app\admin\common\Tree;
use app\admin\model\AdminMenus;
use app\admin\model\AuthRules;
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
            'sort_id.require' => '请输入排序id',
            'sort_id.number' => '排序id必须是数字',
            'log_type' => '日志记录方式不能为空',
        ];

        $tree = new Tree();

        $result = Db::table("think_admin_menus")->order(["sort_id" => "asc", 'menu_id' => 'asc'])->column('*', 'menu_id');
        $optionList = $tree->getOptions(0, $result);
        $this->assign('optionList', $optionList);

        if ($this->request->isPost()) {

            //判断是否通过验证 验证通过就提示添加成功 然后跳转到index 如果失败
            $params = $this->request->param();

            $validate = new Validate($rule, $message);
            if (!$validate->check($params)) {
                $this->error($validate->getError(), "add");
            } else {
                //验证通过 就要插入
                $adminMenus = new AdminMenus();
                $adminMenus->data($params);
                $adminMenus->save();
                $rule_data = [
                    'title' => $this->post['title'],
                    'name' => $this->post['url'],
                ];
                if ($adminMenus->menu_id) {
                    if ($adminMenus->authRule()->save($rule_data)) {
                        return $this->success("添加成功！", "index");
                    } else {
                        return $this->error("关联权限添加失败", "index");
                    }

                } else {
                    $this->redirect("add", $params);
                }
            }

        }
        return $this->fetch("add");

    }

    public function del($id) {
        //考虑删除父元素怎么办，所以del按钮 需要提示删除所有子元素

        $arr = array($id);
        foreach ($this->menuList as $k => $v) {
            if ($v["parent_id"] == $id) {
                $arr[] = $v["menu_id"];
            }
        }
        $trans_result = true;

        $adminMenus = new AdminMenus();
        $adminMenus->startTrans();
        $res = AdminMenus::destroy($arr);
        if (!$res) {
            $trans_result = false;
        }
        $authRules = new AuthRules();
        $authRules->startTrans();
        $res = AuthRules::where('menu_id', 'IN', $arr)->delete();
        if (!$res) {
            $trans_result = false;
        }
        if ($trans_result) {
            $adminMenus->commit();
            $authRules->commit();
            $this->success("删除成功！", "index");
        } else {
            $adminMenus->rollBack();
            $authRules->rollBack();
            $this->error("删除失败！", "index");
        }

        // $adminRules->commit();

    }

}
?>