<?php
namespace app\admin\common;

class Tree {
    protected $repeatPlaceholder = "&nbsp;&nbsp;&nbsp;&nbsp;";

    public function getSideMenu($levelId, $currentId, $parentIds, $data, $sideMenuText = "", $repeatNum = 0) {
        $child = $this->getChild($levelId, $data);
        $repeatText = str_repeat($this->repeatPlaceholder, $repeatNum);
        if (is_array($child)) {
            foreach ($child as $key => $value) {
                $subChild = $this->getChild($value["menu_id"], $data);
                if ($subChild) {

                    if (array_search($value["menu_id"], $parentIds, true) !== false) {
                        $sideMenuText .= '<li class="treeview active hactive"><a href="javascript:void(0);"><span class="fl">' . $repeatText . '</span><i class="iconfont f14">&#xe65d;</i><span class="txt">' . $value['title'] . '</span><span class="more"></span></a><ul class="treeview-menu">';
                    } else {
                        $sideMenuText .= '<li class="treeview"><a href="javascript:void(0);"><span class="fl">' . $repeatText . '</span><i class="iconfont f14">&#xe65d;</i><span class="txt">' . $value['title'] . '</span><span class="more"></span></a><ul class="treeview-menu">';
                    }
                    $repeatNum++;
                    $sideMenuText = $this->getSideMenu($value["menu_id"], $currentId, $parentIds, $data, $sideMenuText, $repeatNum);

                    $sideMenuText .= "</ul></li>";
                } else {
                    if ($value["menu_id"] == $currentId) {
                        $sideMenuText .= '<li class="current"><a href="' . url($value["url"]) . '"><span class="fl">' . $repeatText . '</span><i class="iconfont f14">&#xe65d;</i><span class="txt">' . $value['title'] . '</span></a></li>';
                    } else {
                        $sideMenuText .= '<li><a href="' . url($value["url"]) . '"><span class="fl">' . $repeatText . '</span><i class="iconfont f14">&#xe65d;</i><span class="txt">' . $value['title'] . '</span></a></li>';
                    }
                }
            }
        }
        return $sideMenuText;
    }

    public function getChild($id, $data) {
        $arr = array();
        foreach ($data as $k => $v) {
            if ($v["parent_id"] == $id) {
                $arr[] = $v;
            }
        }
        return !empty($arr) ? $arr : false;
    }

    public function getMenu($levelId, $data, $str = "", $repeatNum = 0) {
        $child = $this->getChild($levelId, $data);

        $repeatText = str_repeat($this->repeatPlaceholder, $repeatNum);
        if (is_array($child)) {
            foreach ($child as $key => $value) {
                $subChild = $this->getChild($value["menu_id"], $data);

                if ($subChild) {

                    if ($repeatNum == 0) {
                        $str .= '<tr>';
                        $str .= '<td>' . $value["menu_id"] . '</td>';
                        $str .= '<td class="align-l">' . $value["title"] . '</td>';
                        $str .= '<td>' . $value["url"] . '</td>';
                        $str .= '<td>0</td>';
                        $str .= '<td>大图</td>';
                        $str .= '<td>正常</td>';
                        $str .= '<td>大图</td>';
                        $str .= '<td>正常</td>';
                        $str .= '<td><a href="#" class="am-btn am-btn-danger am-btn-xs">删除</a><a href="#" class="am-btn am-btn-primary am-btn-xs">修改</a></td>';
                        $str .= '</tr>';
                    } else {
                        $str .= '<tr>';
                        $str .= '<td>' . $value["menu_id"] . '</td>';
                        $str .= '<td class="align-l">' . $repeatText . '|—— ' . $value["title"] . '</td>';
                        $str .= '<td>' . $value["url"] . '</td>';
                        $str .= '<td>0</td>';
                        $str .= '<td>大图</td>';
                        $str .= '<td>正常</td>';
                        $str .= '<td>大图</td>';
                        $str .= '<td>正常</td>';
                        $str .= '<td><a href="#" class="am-btn am-btn-danger am-btn-xs">删除</a><a href="#" class="am-btn am-btn-primary am-btn-xs">修改</a></td>';
                        $str .= '</tr>';
                    }
                    $repeatNum++;
                    $str = $this->getMenu($value["menu_id"], $data, $str, $repeatNum);

                } else {
                    if ($repeatNum == 0) {
                        $str .= '<tr>';
                        $str .= '<td>' . $value["menu_id"] . '</td>';
                        $str .= '<td class="align-l">' . $value["title"] . '</td>';
                        $str .= '<td>' . $value["url"] . '</td>';
                        $str .= '<td>0</td>';
                        $str .= '<td>大图</td>';
                        $str .= '<td>正常</td>';
                        $str .= '<td>大图</td>';
                        $str .= '<td>正常</td>';
                        $str .= '<td><a href="#" class="am-btn am-btn-danger am-btn-xs">删除</a><a href="#" class="am-btn am-btn-primary am-btn-xs">修改</a></td>';
                        $str .= '</tr>';
                    } else {
                        $str .= '<tr>';
                        $str .= '<td>' . $value["menu_id"] . '</td>';
                        $str .= '<td class="align-l">' . $repeatText . $value["title"] . '</td>';
                        $str .= '<td>' . $value["url"] . '</td>';
                        $str .= '<td>0</td>';
                        $str .= '<td>大图</td>';
                        $str .= '<td>正常</td>';
                        $str .= '<td>大图</td>';
                        $str .= '<td>正常</td>';
                        $str .= '<td><a href="#" class="am-btn am-btn-danger am-btn-xs">删除</a><a href="#" class="am-btn am-btn-primary am-btn-xs">修改</a></td>';
                        $str .= '</tr>';
                    }

                }

            }
        }

        return $str;
    }

}

?>