<?php
namespace app\admin\controller;

use think\Config;
use think\Controller;
use think\Request;
use think\Url;

use app\admin\model\AuthUser;

class User extends Base {
    public function index() {
        return $this->fetch();
    }
    //个人资料
    public function profile() {
        return $this->fetch();
    }

    public function uploadAvatar() {
        $tmpDir;
        $storeDir;
        $request = Request::instance();
        $fileInfo = $request->param();
        echo json_encode($fileInfo);
    }
}

?>