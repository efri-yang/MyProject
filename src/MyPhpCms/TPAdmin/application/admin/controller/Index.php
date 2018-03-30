<?php
namespace app\admin\controller;
use app\admin\common\Auth;
use think\Controller;

class Index extends Controller {
    public function index() {
        $auth = new Auth();
        // $str = preg_replace('/^.+\?/U', '', 'admin/index/say/id/10?id=10&age=20');
        parse_str("id=10&age=20", $param);
        $str = preg_replace('/\?.*$/U', '', 'admin/index/say/id/10?id=10&age=20');

        echo $str;
    }
}
?>