<?php
namespace app\admin\controller;
use app\admin\common\Tree;
use app\admin\model\AuthGroup;
use app\admin\model\AuthRules;
use think\Db;
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
            'title' => 'require',
        ];
        $message = [
            'title' => '角色名不能为空',
        ];

        if ($this->request->isPost()) {
            //如果是提交的时候
            $param = $this->request->param();
            //默认的就是只有首页和系统管理下的个人资料
            $param["rules"] = '1,2,23';

            Session::set('form_info', $param);
            $validate = new Validate($rule, $message);
            if (!$validate->check($param)) {
                $this->error($validate->getError(), "add");
            } else {
                //验证通过，那么就要插入到数据库中
                $authgroup = new AuthGroup();
                $authgroup->data($param);
                if ($authgroup->save()) {
                    $this->success("添加成功！", "index");
                } else {
                    $this->error("添加失败！", "add");
                }
            }
        } else {
            Session::set('form_info', '');
        }
        return $this->fetch();
    }
    public function edit($id) {
        return $this->fetch();
    }
    public function del($id) {
        if (AuthGroup::destroy($id)) {
            $this->success("删除成功！", "index");
        } else {
            $this->error("删除失败！", "index");
        }
    }
    public function access($id) {
        //$id角色id
        //获取角色id 对应的角色信息
        $role = AuthGroup::get($id)->toArray();

        //获取角色 对应的权限id 数组
        $ruleCheck = explode(",", $role["rules"]);

        //获取表中所有的权限(为什么menu而不是rules)
        $menuAll = Db::table("think_admin_menus")->order(["sort_id" => "asc", "menu_id" => "asc"])->column("*", "menu_id");

        //从auth_rules中判断哪些是在$ruleCheck 里面的，然后返回menu_id吗,然后在menus表中根据menu_id 整合数据
        $authRules = new AuthRules();
        //从auth_rules当中获取当前角色拥有的menu_id
        $roleRule = $authRules->whereIn('id', $ruleCheck)->column('menu_id');

        //从admin_menus 当中去

        //获取所有的权限规则(id作为键值)

        //进行字符窜操作
        function getStr($levelId, $ruleCheck, $data, $str = "", $num = 0) {
            $tree = new Tree();
            $child = $tree->getChild($levelId, $data);

            foreach ($child as $key => $value) {
                $subChild = $tree->getChild($value["menu_id"], $data);
                if ($subChild) {
                    if (!$num) {
                        $str .= '<div class="authadmin-item-box"><div class="caption"><label><input type="checkbox" name="auth[]" class="mr5" />'.$value['title'].'</label></div><ul class="authadmin-item-list clearfix">';
                    } else {
                        $str .= '<li class="treeview"><div class="item"><label class="fwnormal"><input type="checkbox" name="auth[]" class="mr5">'.$value['title'].'</label></div><ul class="authadmin-item-list clearfix">';
                    }
                    $num++;
                    $str=getStr($value["menu_id"], $ruleCheck, $data,$str,$num);
                    $str.="</ul></div>";
                    $num=0;
                    
                } else {
                    //如果没有子元素 且第一个元素的时候
                    if (!$num) {
                        $str .= '<div class="authadmin-item-box"><div class="caption"><label><input type="checkbox" name="auth[]" class="mr5" />'.$value['title'].'</label></div></div>';
                    } else {
                        $str .= '<li><div class="item"><label class="fwnormal"><input type="checkbox" name="auth[]" class="mr5">'.$value['title'].'</label></div></li>';
                    }
                }
            }

            return $str;
        }
        $str=getStr(0, $ruleCheck, $menuAll);

        
        $this->assign("ruleList",$str);
        return $this->fetch();
    }
}
?>