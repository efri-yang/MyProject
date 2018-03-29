<?php
namespace app\admin\controller;
use app\admin\common\Auth;
use think\Controller;

class Index extends Controller {
    public function index() {
        $auth = new Auth();
        print_r($auth->getGroups(2));
    }
}
?>