<?php
namespace app\admin\common;
use think\Config;
use think\Cookie;
use think\Db;
use think\Loader;
use think\Request;
use think\session;

class Auth {
    protected $request;
    protected $config = [
        'auth_on' => true, // 认证开关
        'auth_type' => 1, // 认证方式，1为实时认证；2为登录认证。
        //登录验证那么我登陆后在后台修改权限，用户热然可以访问,但是实时验证就不一样，默认还是实时验证好
        'auth_group' => 'auth_group', // 用户组数据表名
        'auth_group_access' => 'auth_group_access', // 用户-用户组关系表
        'auth_rule' => 'auth_rules', // 权限规则表
        'auth_user' => 'auth_user', // 用户信息表
    ];

    public function __construct() {
        if ($auth = Config::get("auth")) {
            $this->config = array_merge($this->config, $auth);
        }
        $this->request = Request::instance();
    }

    /**
     * 检查权限
     * @param $name string|array  需要验证的规则列表,支持逗号分隔的权限规则或索引数组
     * @param $uid  int           认证用户的id
     * @param string $relation 如果为 'or' 表示满足任一条规则即通过验证;如果为 'and'则表示需满足所有规则才能通过验证
     * @param int $type 认证类型 1为实时认证
     * @param string $mode 执行check的模式
     * @return bool               通过验证返回true;失败返回false
     */
    public function check($name, $uid, $relation = "or", $type = 1, $mode = "url") {
        //超级管理员不做限制
        if (Session::get("user.user_id") == 1) {
            return true;
        }
        //权限开关关闭，那么所有人都有权限
        if (!$this->config['auth_on']) {
            return true;
        }
        //
    }

    /**
     * 根据用户id获取用户组,返回值为数组
     * @param  $uid int     用户id
     * @return array       用户所属的用户组 array(
     * @返回数据格式
     * array(
     *     array('uid'=>'用户id','group_id'=>'用户组id','title'=>'用户组名称','rules'=>'用户组拥有的规则id,多个,号隔开'),
     *   array('uid'=>'用户id','group_id'=>'用户组id','title'=>'用户组名称','rules'=>'用户组拥有的规则id,多个,号隔开')
     * )
     * Loader::parseName("ABC", 0)=a_b_c
     * Loader::parseName("ABC", 1)=ABC
     *Loader::parseName("AbC", 0);=ab_c
     * Loader::parseName("AbC",1);=AbC
     * Loader::parseName("a_b_c",0);=a_b_c
     * Loader::parseName("a_b_c", 1)=ABC;
     */
    public function getGroups($uid) {
        static $groups = [];
        if (isset($groups[$uid])) {
            return $groups[$uid];
        }
        $type = Config::get('database.prefix') ? 1 : 0;
        //AuthGroupAccess
        $auth_group_access = Loader::parseName($this->config['auth_group_access'], $type);
        $auth_group = Loader::parseName($this->config['auth_group'], $type);

        // 执行查询Db::view 表名字可以是驼峰和下划线
        $user_groups = Db::view($auth_group_access, 'uid,group_id')
            ->view($auth_group, 'title,rules', "{$auth_group_access}.group_id={$auth_group}.id", 'LEFT')
            ->where("{$auth_group_access}.uid='{$uid}' and {$auth_group}.status='1'")
            ->select();
        $groups[$uid] = $user_groups ?: [];
        return $groups[$uid];
    }

    /**
     * 获得权限列表
     * @param integer $uid 用户id
     * @param integer $type
     * @return array
     * 根据用户id 获取属于哪些用户组，然后将用户组的权限合并！！！
     */
    protected function getAuthList($uid, $type) {
        static $_authList = [];
        $t = implode(',', (array) $type);

        if (isset($_authList[$uid . $t])) {
            return $_authList[$uid . $t];
        }

        if (2 == $this->config['auth_type'] && Session::has('_auth_list_' . $uid . $t)) {
            return Session::get('_auth_list_' . $uid . $t);
        }

        $groups = $this->getGroups($uid);
        $ids = []; //保存用户所属用户组设置的所有权限规则id
        foreach ($groups as $key => $value) {
            //去除rules前后的逗号
            $ids = array_merge($ids, explode(',', trim($g['rules'], ',')));
        }
        $ids = array_unique($ids);
        if (empty($ids)) {
            $_authList[$uid . $t] = array();
            return array();
        }
        $map = array(
            'id' => ['in', $ids],
            'type' => $type,
            'status' => 1,
        );
        $rules = Db::name($this->config['auth_rule'])->where($map)->field('condition,name')->select();
        $authList = [];
        foreach ($rules as $rule) {
            if (!empty($rule['condition'])) {
                $user = $this->getUserInfo($uid); //获取用户信息,一维数组
                //$command=$user['score'] > 50 and $user['score'] <100
                $command = preg_replace('/\{(\w*?)\}/', '$user[\'\\1\']', $rule['condition']);
                //执行$command 条件并将结果返回给condition(0 或者 1)
                @(eval('$condition=(' . $command . ');'));
                if ($condition) {
                    $authList[] = strtolower($rule['name']);
                }
            } else {
                $authList[] = strtolower($rule['name']);
            }
        }
        $_authList[$uid . $t] = $authList;
        //登录认证
        if ($this->config['auth_type'] == 2) {
            Session::set('_auth_list_' . $uid . $t, $authList);
        }
        return array_unique($authList);

    }

}

?>