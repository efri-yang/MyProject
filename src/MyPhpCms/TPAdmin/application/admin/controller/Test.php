<?php
namespace app\admin\controller;
use app\admin\common\Tree2;
use think\Controller;
use think\Db;

class Test extends Controller {
    public function index() {
        $arr = array(
            array('id' => 1, 'pid' => 0, 'name' => '浙江', 'sort' => 0),
            array('id' => 10, 'pid' => 1, 'name' => '宁波', 'sort' => 0),
            array('id' => 13, 'pid' => 1, 'name' => '金华', 'sort' => 1),
            array('id' => 4, 'pid' => 0, 'name' => '上海', 'sort' => 2),
            array('id' => 5, 'pid' => 4, 'name' => '闵行', 'sort' => 0),
            array('id' => 6, 'pid' => 10, 'name' => '宁海', 'sort' => 0),
        );

        $arr2 = Tree2::sort($arr, 'sort');
        $data = Tree2::hTree($arr);

        print_r($data);

    }
}
?>