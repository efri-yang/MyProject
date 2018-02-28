<?php
namespace app\admin\controller;

use think\Config;
use think\Controller;
use think\Request;
use think\Url;

class User extends Base {
    public function profile() {
        $userId = $this->webData["user_info"]["id"];
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