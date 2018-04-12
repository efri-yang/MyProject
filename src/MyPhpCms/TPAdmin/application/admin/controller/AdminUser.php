<?php
namespace app\admin\controller;

use app\admin\model\AuthUser;
use app\admin\model\AuthGroup;


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

    public function  add(){
        //要去auth_group 查询所有的角色
        $groupList=AuthGroup::all()->toArray();
        if($this->request->isPost()){
            $param=$this->request->param();
            //

        }else{
            $this->assign("groupList",$groupList);
            return $this->fetch();
        }
       
        
        
        
    }

}
?>