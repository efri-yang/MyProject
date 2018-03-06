<?php
namespace app\admin\controller;

use app\admin\model\AuthUser;
use think\Config;
use think\Controller;
use think\Request;
use think\Url;

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
        $file = request()->file('image');
        if ($file) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($info) {
                echo $info->getExtension();
            } else {
                echo $file->getError();
            }
        }
    }
}

?>