<?php
/**
 * 后台基础控制器
 * @author yupoxiong <i@yufuping.com>
 * @version 1.0
 */

namespace app\admin\controller;

use app\admin\auth\Auth;
use app\admin\auth\Tree;
use app\common\model\AdminUsers;
use think\Controller;
use think\Db;
use think\exception\ClassNotFoundException;
use think\exception\HttpResponseException;
use think\Log;
use think\Request;
use think\Response;
use think\Session;
use think\Url;

class Base extends Controller {
    protected $request, $request_type, $param, $post, $get, $module, $controller, $action, $url, $do_url, $id, $web_data, $api_result, $model;

    public function __construct() {
        $this->request = Request::instance();
        $this->request_type = $this->request->isGet() ? 1 : (
            $this->request->isPost() ? 2 : (
                $this->request->isPut() ? 3 : (
                    $this->request->isDelete() ? 4 : 0
                )));

        $this->param = $this->request->param();
        $this->post = $this->request->post();
        $this->get = $this->request->get();
        $this->module = $this->request->module();
        $this->controller = $this->request->controller();
        $this->action = $this->request->action();
        $this->do_url = $this->parseName($this->module) . "/" . $this->parseName($this->controller) . "/";
        $this->url = $this->parseName($this->module) . '/' . $this->parseName($this->controller) . "/" . $this->parseName($this->action);
        $this->id = isset($this->param['id']) ? $this->param['id'] : -1;
        $this->api_result = [
            'status' => 404,
            'extend' => [],
            'result' => [],
            'message' => '',
            'timestamp' => time(),
        ];

        parent::__construct();
        //会执行 下面的 __initialize();

    }

    public function _initialize() {

        $auth = new Auth();
        if ($this->request->isAjax()) {
            if ($auth->is_login()) {
                $user_id = Session::get('user.user_id');
                if ($user_id != 1) {

                    if (!$auth->check($this->url, $user_id)) {
                        //未授权
                        $this->api_result['status'] = 403;
                        $this->api_result['message'] = 'Unauthorized';
                        throw new HttpResponseException(json($this->api_result));
                    }
                }
                $menu_info = $this->getMenuInfo();
                $log_type = $menu_info['log_type'];
                if ($log_type == $this->request_type && $log_type != 0) {
                    $auth->createLog($menu_info['title'], $log_type);
                }
                if (isset($this->post['id'])) {
                    $this->id = $this->post['id'];
                }

            } else {
                //未登录
                $this->api_result['status'] = 401;
                $this->api_result['message'] = ' Not logged in';
                throw new HttpResponseException(json($this->api_result));
            }
        } else {
            if ($auth->is_login()) {
                $user_id = Session::get('user.user_id');
                if ($user_id != 1) {

                    if (!$auth->check($this->url, $user_id)) {
                        $this->do_error('无权限');
                    }
                }

                //Debug::remark('begin');

                $this->web_data['do_url'] = $this->do_url;

                //判断当前页面是否是添加或者编辑页面，然后启用jquery.valitade.js插件
                if (($this->action == 'add' || $this->action == 'edit') && ($this->request->isGet() == true)) {
                    $this->web_data['valitade_js'] = 1;
                }

                //增删改
                if (!($this->action == 'add' || $this->action == 'edit') && ($this->request->isGet() == true)) {

                    $this->web_data['data_add_url'] = url($this->do_url . 'add');
                    $this->web_data['data_add_title'] = Db::name('admin_menus')->where("url='" . $this->do_url . "add'")->value('title');
                    $this->web_data['data_del_url'] = url($this->do_url . 'del');
                    $this->web_data['data_edit_url'] = url($this->do_url . 'edit');
                }

                /*if (Cache::store('redis')->has('left_menu_' . $user_id)) {
                $this->web_data['left_menu'] = Cache::store('redis')->get('left_menu_' . $user_id);
                } else {
                $left_menu = $this->getLeftMenu();
                $cache_left_menu = Cache::store('redis')->set('left_menu_' . $user_id, $left_menu);
                if ($cache_left_menu) {
                $this->web_data['left_menu'] = $left_menu;
                }
                 */

                $this->web_data['left_menu'] = $this->getLeftMenu();
                $menu_info = $this->getMenuInfo();

                $this->web_data['web_title'] = $menu_info['title'];
                $this->web_data['log_type'] = $menu_info['log_type'];
                $user_info = $this->getUserInfo($user_id);

                $this->web_data['user_info'] = $user_info;

                //Debug::remark('end');

                //echo Debug::getRangeTime('begin','end').'s';

                $log_type = $this->web_data['log_type'];
                if ($log_type == $this->request_type && $log_type != 0) {
                    $auth->createLog($this->web_data['web_title'], $log_type, $this->id);
                }

            } else {
                $this->redirect('pub/login', ['uri' => $this->url]);
            }
        }
    }

    protected function getMenuChild($arr, $myid) {
        $a = $newarr = array();
        if (is_array($arr)) {
            foreach ($arr as $id => $a) {
                if ($a['parent_id'] == $myid) {
                    $newarr[$id] = $a;
                }

            }
        }
        return $newarr ? $newarr : false;
    }

    protected function getMenuParent($arr, $myid, $parent_ids = array()) {
        $a = $newarr = array();
        if (is_array($arr)) {
            //遍历当前用户所有权限列表
            foreach ($arr as $id => $a) {
                if ($a['menu_id'] == $myid) {
                    //如果不是顶级的目录，那么久添加到$parent_ids，相当于获取当前栏目的所有父栏目
                    if ($a['parent_id'] != 0) {
                        array_push($parent_ids, $a['parent_id']);
                        $parent_ids = $this->getMenuParent($arr, $a['parent_id'], $parent_ids);
                    }
                }
            }
        }

        return !empty($parent_ids) ? $parent_ids : false;
    }

    //获当前url取面包屑
    protected function getBreadcrumb() {
        $menus = Db::name('admin_menus')->where('is_show=1')->select();
    }

    protected function getCurrentNav($arr, $myid, $parent_ids = array(), $current_nav = '') {
        $a = $newarr = array();
        if (is_array($arr)) {
            foreach ($arr as $id => $a) {
                if ($a['menu_id'] == $myid) {
                    if ($a['parent_id'] != 0) {
                        array_push($parent_ids, $a['parent_id']);

                        $ru = '<li><a><i class="fa ' . $a['icon'] . '"></i> ' . $a['title'] . '</a></li>';
                        $current_nav = $ru . $current_nav;
                        $temp_result = $this->getCurrentNav($arr, $a['parent_id'], $parent_ids, $current_nav);
                        $parent_ids = $temp_result[0];
                        $current_nav = $temp_result[1]; //一系列字符窜<li></li>

                    }
                }
            }
        }

        return !empty([$parent_ids, $current_nav]) ? [$parent_ids, $current_nav] : false;
    }

    protected function getMenuInfo() {
        return Db::name('admin_menus')->where(['url' => $this->url])->find();
    }

    protected function getUserInfo($user_id) {
        $user_info = AdminUsers::get($user_id);

        print_r($user_info);
        return $user_info;
    }

    public function _empty() {
        return $this->do_error('页面不存在');
    }

    /**
     * 添加，修改时返回成功信息方法
     * @param string $msg
     * @param string $url
     * @param string $data
     */
    protected function do_success($msg = '操作成功！', $url = '', $data = '') {
        if ($url == '') {
            $url = $this->do_url . 'index';
        }

        return $this->redirect($url, $data, 302, ['success_message' => $msg]);
    }

    /**
     * 添加，修改时返回错误信息方法
     * @param string $msg
     * @param null $url
     * @param string $data
     */
    protected function do_error($msg = '操作失败', $url = null, $data = '') {
        $server = $this->request->server();
        if ($url == null && isset($server['HTTP_REFERER'])) {
            $url = $server['HTTP_REFERER'];
        }
        $current_url = $server['REQUEST_SCHEME'] . $server['SERVER_NAME'] . $server['REQUEST_URI'];
        if ($url == $current_url || $this->url == '' || $url == null) {
            $msg = '页面不存在！';
            $url = 'admin/index/index';
        }
        Log::write($this->param, 'error');
        return $this->redirect($url, $data, 302, ['error_message' => $msg, 'form_info' => $this->param]);
    }

    /**
     * ajax返回
     * @param $result
     * @param string $message
     * @param int $status
     * @param string $url
     * @return Response|\think\response\Json|\think\response\Jsonp|\think\response\Redirect|\think\response\View|\think\response\Xml
     * @internal param array $extend
     */
    function ajaxReturn($result = [], $url = '', $message = 'success', $status = 200) {
        $this->api_result['result'] = $result;
        $this->api_result['message'] = $message;
        $this->api_result['status'] = $status;
        $this->api_result['extend']['url'] = $url;

        return Response::create($this->api_result, 'json');
    }

    /**
     * ajax返回数据
     * @param array $result
     * @return Response|\think\response\Json|\think\response\Jsonp|\think\response\Redirect|\think\response\View|\think\response\Xml
     */
    function ajaxReturnData($result = []) {
        return Response::create($result, 'json');
    }
    /**

     * 错误返回
     * @param string $message
     * @param int $status
     * @param array $result
     * @param string $url
     * @return Response|\think\response\Json|\think\response\Jsonp|\think\response\Redirect|\think\response\View|\think\response\Xml
     */
    function ajaxReturnError($message = 'fail', $status = 500, $result = [], $url = '') {
        $this->api_result['result'] = $result;
        $this->api_result['message'] = $message;
        //上传文件用的
        $this->api_result['error'] = $message;
        $this->api_result['status'] = $status;
        $this->api_result['extend']['url'] = $url;

        return Response::create($this->api_result, 'json', 200);
    }

    /**
     * 获取左侧菜单
     * @return mixed
     */
    protected function getLeftMenu() {
        $auth = new Auth();
        //读取所有的权限列表array(1(menu_id)=>array(
        //             [menu_id] => 1
        //          [parent_id] => 0
        //          [is_show] => 1
        //          [title] => 后台首页
        //          [url] => admin/index/index
        //          [param] =>
        //          [icon] => fa-home
        //          [log_type] => 0
        //          [sort_id] => 1
        //          [create_time] => 0
        //          [update_time] => 1489371526
        //          [status] => 1
        //))
        // array 中的id 就是menu_id的值
        $menu = $auth->getMenuList(Session::get('user.user_id'), 1);
        // print_r($menu);
        $max_level = 0;
        $current_id = 1;
        $parent_ids = array(0 => 0);

        $current_nav = ['', ''];
        foreach ($menu as $k => $v) {
            //寻找url 等于当前url 的 item
            if ($v['url'] == $this->url) {

                //返回的是当前menu_id 所有的父元素的id的集合(父元素本身是顶级栏目,返回的是false)
                $parent_ids = $this->getMenuParent($menu, $v['menu_id']);

                $current_id = $v['menu_id'];
                //返回的是array(0=>array(74,34),1=>"<li></li><li><>")
                $current_nav = $this->getCurrentNav($menu, $v['menu_id']);

            }
        }

        if ($parent_ids == false) {
            $parent_ids = array(0 => 0);
        }

        $this->web_data['current_nav'] = $current_nav[1]; //包含父元素的li

        $tree = new Tree();
        // print_r($menu);
        foreach ($menu as $k => $v) {
            //转化成url
            $url = url($v['url']);
            $menu[$k]['icon'] = !empty($v['icon']) ? $v['icon'] : 'fa fa-list';
            $menu[$k]['level'] = $tree->get_level($v['menu_id'], $menu);
            $max_level = $max_level <= $menu[$k]['level'] ? $menu[$k]['level'] : $max_level;
            $menu[$k]['url'] = $url;

        }
        //初始化tree 只是设置一些数据 返回true 或者是false
        $tree->init($menu);

        $text_base_one = "<li class='treeview";
        $text_hover = " active";
        $text_base_two = "'><a href='javascript:void(0);'><i class='fa \$icon'></i><span>\$title</span>
                             <span class='pull-right-container'><i class='fa fa-angle-left pull-right'></i></span>
                             </a><ul class='treeview-menu";
        $text_open = " menu-open";
        $text_base_three = "'>";

        $text_base_four = "<li";
        $text_hover_li = " class='active'";
        $text_base_five = ">
                            <a href='\$url'>
                            <i class='fa \$icon'></i>
                            <span>\$title</span>
                            </a>
                         </li>";
        //<li class='treeview><a href='javascript:void(0);'><i class='fa \$icon'></i><span>\$title</span><span class='pull-right-container'><i class='fa fa-angle-left pull-right'></i></span></a><ul class='treeview-menu">
        $text_0 = $text_base_one . $text_base_two . $text_base_three;
        //<li class='treeview active'><a href='javascript:void(0);'><i class='fa \$icon'></i><span>\$title</span><span class='pull-right-container'><i class='fa fa-angle-left pull-right'></i></span></a><ul class='treeview-menu menu-open">
        $text_1 = $text_base_one . $text_hover . $text_base_two . $text_open . $text_base_three;
        $text_2 = "</ul></li>";

        //$text_current=<li class='active'><a href='\$url'><i class='fa \$icon'></i><span>\$title</span></a></li>
        $text_current = $text_base_four . $text_hover_li . $text_base_five;
        //$text_other=<li><a href='\$url'><i class='fa \$icon'></i><span>\$title</span></a></li>
        $text_other = $text_base_four . $text_base_five;

        for ($i = 0; $i <= $max_level; $i++) {
            $tree->text[$i]['0'] = $text_0;
            $tree->text[$i]['1'] = $text_1;
            $tree->text[$i]['2'] = $text_2;
        }

        $tree->text['current'] = $text_current;
        $tree->text['other'] = $text_other;

        return $tree->get_authTree(0, $current_id, $parent_ids);
    }

    /**
     * 字符串命名风格转换
     * type 0 将Java风格转换为C的风格 1 将C风格转换为Java的风格
     * @param string $name 字符串
     * @param integer $type 转换类型
     * @param bool $ucfirst 首字母是否大写（驼峰规则）
     * @return string
     */
    protected function parseName($name, $type = 0, $ucfirst = true) {
        if ($type) {
            $name = preg_replace_callback('/_([a-zA-Z])/', function ($match) {
                return strtoupper($match[1]);
            }, $name);
            return $ucfirst ? ucfirst($name) : lcfirst($name);
        } else {
            return strtolower(trim(preg_replace("/[A-Z]/", "_\\0", $name), "_"));
        }
    }

    protected function fetch($template = '', $vars = [], $replace = [], $config = []) {
        parent::assign(['web_data' => $this->web_data]);
        return parent::fetch($template, $vars, $replace, $config);
    }

    /**
     * 获取当前控制器对应模型
     * 名称为控制器名称+"s"
     */
    protected function getModel() {
        $class = 'app\\common\\model\\' . $this->request->controller() . 's';
        if (class_exists($class)) {
            return new $class();
        }

        throw new ClassNotFoundException('class not exists:' . $class, $class);
    }

    /**
     * 条件筛选
     * @param $model
     * @return array
     */
    protected function getMap($model) {
        $map = [];
        $table = $model->getTableInfo();
        $param = $this->request->param();

        foreach ($param as $key => $val) {
            if ($val !== "" && in_array($key, $table['fields'])) {
                if (false !== stripos($table['type'][$key], 'text') || false !== stripos($table['type'][$key], 'char')) {
                    $map['like'][$key] = "%" . $val . "%";
                } else {
                    $map['where'][$key] = $val;
                }
            }
        }
        return $map;
    }

    /**
     * 获取排序字段
     * @param $model
     * @return string
     */
    protected function getOrder($model) {
        $order = $model->getPk() . ' desc';
        $param = $this->request->param();
        if (isset($param['_order_name_']) && isset($param['_order_by_'])) {
            $order = $param['_order_name_'] . ' ' . $param['_order_by_'];
        }

        return $order;
    }

    protected function getLinage() {
        return $this->request->param('_linage_') ?: 10;
    }

    /*
     * 获取数据列表
     */
    protected function getList($model, $map, $order = '', $paginate = 10, $field = null, $json = false) {
        if ($field) {
            $model->field($field);
        }
        if (sizeof($map) > 0) {
            if (isset($map['like'])) {
                foreach ($map['like'] as $key => $value) {
                    $model->whereLike($key, $value);
                }
            }

            if (isset($map['where'])) {
                $model->where($map['where']);
            }
        }

        if ($order) {
            $model->order($order);
        }

        $list = $model->paginate($paginate, false, ['query' => $this->request->get()]);
        $this->assign($this->request->get());
        $this->assign([
            'lists' => $list,
            'total' => $list->total(),
            'page' => $list->render(),
            'linage' => $list->listRows(),
        ]);

        return $this->fetch();

    }

    protected function getDataId() {
        return $this->request->param('id');
    }

    protected function deleteData($model, $data_id) {
        return $model::destroy($data_id);
    }

}