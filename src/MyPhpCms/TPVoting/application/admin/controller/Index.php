<?php
namespace app\admin\controller;
use think\Config;
use think\Controller;
use think\Request;
use think\Url;

class Index extends Base {
    public function index() {

        $request = Request::instance();
        return $this->fetch();
    }
}
