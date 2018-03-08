<?php
namespace app\admin\common;
class Tree {
    public $menuList;
    public $icon = array('│', '├', '└');
    public $nbsp = "&nbsp;";
    public $text, $html;
    public $ret = " ";
    public function init($menu = array()) {
        $this->menuList = $menu;

    }
    //array(array(),array())
    //通过遍历每个array 然后在查找子菜单,然后遍历子菜单，然后再查找子菜单，就是递归，判断有子菜单，那么当前
    //菜单 html 结构就不一样
    public function get_authTree($id, $currentNavId, $parentIds) {
        //根据id 获取所有顶级的菜单，然后遍历这些菜单，查找子元素，这个时候需要用到递归的方法
        $nstr = '';
        $child = $this->get_child($id);

        if (is_array($child)) {
            $menu = current($child); //当前项
            $text = isset($this->text[$menu['level']]) ? $this->text[$menu['level']] : end($this->text);
            foreach ($child as $k => $v) {
                @extract($v);
                if ($this->get_child($k)) {
                    //下级菜单是当前页面
                    if (array_search($k, $parentIds, true) !== false) {
                        eval("\$nstr = \"$text[1]\";");
                        $this->html .= $nstr;
                        //下级菜单不是当前页面
                    } else {
                        eval("\$nstr = \"$text[0]\";");
                        $this->html .= $nstr;
                    }
                    self::get_authTree($k, $currentNavId, $parentIds);
                    eval("\$nstr = \"$text[2]\";");
                    $this->html .= $nstr;
                } else {
                    if ($k == $currentNavId) {
                        $a = $this->text['current'];
                        eval("\$nstr = \"$a\";");
                        $this->html .= $nstr;
                    } else {
                        $a = $this->text['other'];
                        eval("\$nstr = \"$a\";");
                        $this->html .= $nstr;
                    }
                }
            }
        }
        return $this->html;

    }

    protected function get_child($menuId) {
        $menu = array();
        if (is_array($this->menuList)) {
            foreach ($this->menuList as $k => $v) {
                if ($v["parent_id"] == $menuId) {
                    $menu[$k] = $v;
                }
            }
        }
        return !empty($menu) ? $menu : false;
    }

    public function get_level($id, $array = array(), $i = 0) {
        //parent_id=0 证明是第一级别  或者 parent_id 找不到对应的键值说明是顶级(第一级) 或者是  当前项的parent_id等于id,那么level 就是0，level 取决于你的参照物
        if ($array[$id]['parent_id'] == 0 || empty($array[$array[$id]['parent_id']]) || $array[$id]['parent_id'] == $id) {
            return $i;
        } else {
            $i++;
            return self::get_level($array[$id]['parent_id'], $array, $i);
        }
    }

    public function get_tree($id, $str, $adds = '', $str_group = '') {
        $parent_id = '';
        $nstr = '';
        $number = 0;
        $child = $this->get_child($id);
        if (is_array($child)) {
            foreach ($child as $k => $v) {
                $j = $n = '';
                $j .= $this->icon[1];
                $n = $adds ? $this->icon[0] : '';
                $spacer = $adds ? $adds . $j : '';
                @extract($v);
                $parent_id == 0 && $str_group ? eval("\$nstr = \"$str_group\";") : eval("\$nstr = \"$str\";");
                $this->ret .= $nstr;
                $nbsp = $this->nbsp;
                $this->get_tree($k, $str, $adds . $n . $nbsp, $str_group);
                $number++;
            }
        }
        return $this->ret;
    }
}
?>