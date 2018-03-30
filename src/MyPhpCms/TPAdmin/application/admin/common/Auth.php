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
        //获取权限列表
        $authList = $this->getAuthList($uid, $type);

        //对参数url($name) 进行格式  并转数组
        if (is_string($name)) {
            $name = strtolower($name);
            if (strpos($name, ",") !== false) {
                $name = explode(',', $name);
            } else {
                $name = [$name];
            }
        }

        $list = [];
        $REQUEST = '';
        //php  序列化 serialize(返回字符串,存储于任何地方。这有利于存储或传递 PHP 的值，同时不丢失其类型和结构)
        //开启url模式时全部转换为小写：
        if ($mode == "url") {
            $REQUEST = unserialize(strtolower(serialize($this->request->param())));
        }
        foreach ($authList as $key => $auth) {
            //获取url 参数 admin/index/say/id/10?id=10&age=20  获取id=10&age=20
            $query = preg_replace('/^.+\?/U', '', $auth);
            if ("url" == $mode && $query != $auth) {
                //获取id=10&age=20 转化成数组  Array ( [id] => 10 [age] => 20 )
                parse_str($query, $param);
                //(返回数组)返回时在$REQUEST中出现同时又出现在$param参数
                $intersect = array_intersect_assoc($REQUEST, $param);
                //返回url  admin/index/say/id/10?id=10&age=20 返回的是 admin/index/say/id/10
                $auth = preg_replace('/\?.*$/U', '', $auth);
                if(in_array($auth,$name) && $intersect == $param){
                    //证明节点符合
                    $list[] = $auth;
                }else{
                    //不是url的模式的时候 只要url 对应就可以
                    if(in_array($auth,$name)){
                        $list[] = $auth;
                    }
                }

            }

        }
        if($relation=='or' && !empty($list)){
            //通过的验证通过的规则名不为空 而且是一个或者的查询
            return true;
        }
        //比较数组$name(传进来的url) 和$list(通过的验证规则的url),并返回返回差集
        $diff = array_diff($name, $list);
        if($relation=="and" && empty($diff)){
            return true;
        }
        return false;
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

    public static function dataAuthSign($data){
        if(!is_array($data)){  
            $data = (array)$data; 
        } 
        ksort($data); //排序  
         //http_build_query 一个数组经过转化后 foo=bar&baz=boom&cow=milk&php=hypertext
        $code = http_build_query($data);
        //sha1 以后 就变成4d759639adf55f64691e8e66b288683c9de02dfc
        $sign = sha1($code); //生成签名
        return $sign;
    }



    public static function login($uid,$username,$remember=false){
        if(empty($uid) || empty($username)){
            return false;
        }
        $user = [
            'user_id' => $uid,
            'user_name' => $username,
            'timestamp' => time()
        ];
        Session::set('user', $user);
        Session::set('user_sign', self::data_auth_sign($user));
        if($remember==true){

        }
    }

}

?>