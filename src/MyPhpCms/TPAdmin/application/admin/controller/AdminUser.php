<?php
namespace app\admin\controller;

use app\admin\model\AuthGroup;
use app\admin\model\AuthGroupAccess;
use app\admin\model\AuthUser;
use think\Paginator;

class AdminUser extends Base {
    public function index() {
        //获取auth_user 所有数据并展示
        $authUser = new AuthUser();
        $authUser->where('id', '<>', 1);
        $lists = $authUser->paginate();
        $page = $lists->render();
        $this->assign("list", $lists);
        $this->assign('page', $page);
        return $this->fetch();
    }
    public function profile() {
        return $this->fetch();
    }

    public function add() {
        //要去auth_group 查询所有的角色
        $groupList = AuthGroup::all()->toArray();
        if ($this->request->isPost()) {
            $trans_result = true;
            $param = $this->request->param();
            //

            $authUser = new AuthUser();
            $authUser->startTrans();
            $authUser->data([
                'username' => $param["username"],
                'password' => md5($param["password"]),
                'email' => $param['email'],
                'phone' => $param["phone"],
            ]);
            if ($authUser->save() === false) {
                $trans_result = false;
            }

            $authGroupAccess = new AuthGroupAccess();
            $authGroupAccess->startTrans();
            $authGroupAccess->data([
                'uid' => $authUser->id,
                'group_id' => $param["group_id"],
            ]);
            if ($authGroupAccess->save() === false) {
                $trans_result = false;
            }
            if ($trans_result) {
                $authUser->commit();
                $authGroupAccess->commit();
                $this->success("添加成功！", "index");
            } else {
                $authUser->rollBack();
                $authGroupAccess->rollBack();
                $this->error("添加失败！", "index");
            }
        } else {
            $this->assign("groupList", $groupList);
            return $this->fetch();
        }

    }

}
?>