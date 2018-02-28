<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Url;
use think\Config;

class Index extends Base {

    public function index() {
        $request = Request::instance();
        return $this->fetch();
    }

}
