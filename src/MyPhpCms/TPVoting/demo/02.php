<?php
$arr = Array
    (

    "34" => Array
    (
        "menu_id" => 34,
        "parent_id" => 0,
        "is_show" => 1,
        "title" => "系统管理",
        "url" => "admin/sys",
        "param" => "",
        "icon" => "fa-gear",
        "log_type" => 0,
        "sort_id" => 100,
        "create_time" => 1489335249,
        "update_time" => 1496385260,
        "status" => 1,
    ),

    "35" => Array
    (
        "menu_id" => 35,
        "parent_id" => 37,
        "is_show" => 1,
        "title" => "操作日志",
        "url" => "admin/dolog/index",
        "param" => "",
        "icon" => "fa-keyboard-o",
        "log_type" => 0,
        "sort_id" => 100,
        "create_time" => 1489335334,
        "update_time" => 1497584062,
        "status" => 1,
    ),

    "37" => Array
    (
        "menu_id" => 37,
        "parent_id" => 34,
        "is_show" => 1,
        "title" => "日志管理",
        "url" => "admin/logs",
        "param" => "",
        "icon" => "fa-info",
        "log_type" => 0,
        "sort_id" => 100,
        "create_time" => 1489394592,
        "update_time" => 1494931863,
        "status" => 1,
    ),

    "50" => Array
    (
        "menu_id" => 50,
        "parent_id" => 37,
        "is_show" => 1,
        "title" => "系统日志",
        "url" => "admin/syslog/index",
        "param" => "",
        "icon" => "fa-info-circle",
        "log_type" => 0,
        "sort_id" => 100,
        "create_time" => 1494498392,
        "update_time" => 1497584191,
        "status" => 1,
    ),

);
function getMenuParentid($authMenuList, $childMenuId, $parentIds = array()) {

    foreach ($authMenuList as $k => $v) {

        //当前菜单的parent==menu菜单中某个menu_id 的值就可以确认是 当前菜单的父菜单
        if ($v["menu_id"] == $childMenuId) {
            if ($v['parent_id'] != 0) {
                array_push($parentIds, $v['parent_id']);
                $parentIds = getMenuParentid($authMenuList, $v["parent_id"], $parentIds);
            }

        }
    }
    return !empty($parentIds) ? $parentIds : false;
}

$parentIds = getMenuParentid($arr, 50);

print_r($parentIds);

?>