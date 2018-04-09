<?php
namespace app\admin\controller;
use app\admin\model\AuthGroup;

class Role extends Base {
    public function index() {
        $authgroup = new AuthGroup();

        $result = $authgroup->select()->toArray();
        //如果是数据集查询的话有两种情况，由于默认的数据集返回结果的类型是一个数组因此无法调用 toArray 方法，必须先转成数据集对象然后再使用 toArray 方法，系统提供了一个 collection 助手函数实现数据集对象的转换
        //
        //如果设置了模型的数据集返回类型的话，则可以简化使用  protected $resultSetType = 'collection';

        $this->assign("rolelist", $result);
        return $this->fetch();
    }

    public function add() {
        return $this->fetch();
    }

    public function access($id) {
        echo $id;
        return "权限管理页面";
    }
}
?>