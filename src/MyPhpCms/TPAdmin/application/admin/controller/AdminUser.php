<?php
namespace app\admin\controller;

use app\admin\model\AuthUser;

class AdminUser extends Base {
    public function index() {
        //获取auth_user 所有数据并展示
        $authUser = new AuthUser();
        $authUser->where('id', '<>', 1);
        $lists = $authUser->select()->toArray();
        $this->assign("list", $lists);
        return $this->fetch();
    }
    public function profile() {
        return $this->fetch();
    }

}
?>