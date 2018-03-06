<?php
namespace app\admin\controller;

use app\admin\model\AuthUser;
use think\Config;
use think\Controller;
use think\Request;
use think\Url;
use think\File;


class User extends Base {
    public function index() {
        return $this->fetch();
    }
    //个人资料
    public function profile($action = '') {
        if (!$action) {
            return $this->fetch();
        } else {
            return $this->fetch("user/profileEdit");
        }
    }

    public function uploadAvatar() {
        $file = request()->file('file');
        if ($file) {

            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'. DS .'admin'. DS .'avatar');
            if ($info) {
                $authUser=new AuthUser();
                $filePath=$info->getSaveName();
                $authUser->save(["avatar"=>$filePath],["id"=>1]);
                return json_encode(array("filePath"=>$info->getSaveName()));
            } else {
                return 0;
               
            }
        }
    }
}

?>