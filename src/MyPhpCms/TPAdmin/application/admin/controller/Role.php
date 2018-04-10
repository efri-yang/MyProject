<?php
namespace app\admin\controller;
use app\admin\model\AuthGroup;
use think\Session;
use think\Validate;

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
        $rule = [
            'title' => 'require'
        ];
        $message = [
            'title' => '角色名不能为空'
        ];


        if($this->request->isPost()){
            //如果是提交的时候
            $param=$this->request->param();
            //默认的就是只有首页和系统管理下的个人资料
            $param["rules"]='1,2,23';


            Session::set('form_info',$param);
            $validate=new Validate($rule,$message);
            if(!$validate->check($param)){
                $this->error($validate->getError(),"add");
            }else{
                //验证通过，那么就要插入到数据库中
                $authgroup = new AuthGroup();
                $authgroup->data($param);
                if($authgroup->save()){
                    $this->success("添加成功！","index");
                }else{
                    $this->error("添加失败！","add");
                }
            }            
        }else{
            Session::set('form_info','');
        }
        return $this->fetch();
    }

    public function access($id) {
        echo $id;
        return "权限管理页面";
    }
}
?>