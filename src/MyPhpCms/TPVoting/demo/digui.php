<?php
$mysqli = new mysqli("localhost", "root", "yyh", "thinkphp");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* change character set to utf8 */
if (!$mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit();
}

$sql = "select * from think_admin_menus";
$result = $mysqli->query($sql);
$resArr = array();
while ($row = $result->fetch_assoc()) {
    $resArr[] = $row;
}
$currentId = 17;

//系统日志17  日志管理(15)  系统管理2
//获取id 对应的父元素

// function getParentId($id, $data, $arr = array()) {
//     foreach ($data as $key => $value) {
//         //刷选当前id 对应的父id
//         if ($value["menu_id"] == $id) {
//             if (!!$value["parent_id"] && $value["parent_id"] != 0) {
//                 $pid = $value["parent_id"];
//                 $arr[] = $pid;
//                 $arr = getParentId($pid, $data, $arr);
//             }
//         }
//     }
//     return $arr;
// }

// $parentIds=getParentId($currentId,$resArr);

// print_r($parentIds);

//获取parentid 相同的所有元素

// function getChildByParentId($pid,$data,$arr=array()){
//     foreach ($data as $key => $value) {
//         if($value["parent_id"]==$pid){
//             $arr[]=$value;
//         }
//     }
//     return $arr;
// }

function getChild($id, $data) {
    foreach ($data as $key => $value) {
        if ($value["parent_id"] == $id) {
            $arr[$value["menu_id"]] = $value;
        }
    }
    return isset($arr) ? $arr : false;
}

function getParentId($id, $data, $arr = array()) {
    foreach ($data as $key => $value) {
        if ($value["menu_id"] == $id) {
            if ($value["parent_id"] != 0) {
                $arr[] = $value["parent_id"];
                $arr = getParentId($value["parent_id"], $data, $arr);
            }
        }
    }
    return $arr;
}

$parentIds = getParentId(17, $resArr);

function getTree($id, $data, $parentIds, $currentId, $nav = "") {
    $child = getChild($id, $data);
    if (is_array($child)) {
        foreach ($child as $key => $value) {
            $subChild = getChild($key, $data);
            if ($subChild) {
                if (array_search($value["menu_id"], $parentIds, true) !== false) {
                    //证明这个是当前id 对应的父元素

                    $nav .= '<li class="treeview active"><a href="' . $value["url"] . '">' . $value["menu_id"] . $value["title"] . '</a><ul class="treemenu">';
                } else {

                    $nav .= '<li class="treeview"><a href="' . $value["url"] . '">' . $value["menu_id"] . $value["title"] . '</a><ul class="treemenu">';
                }

                $nav = getTree($value["menu_id"], $data, $parentIds, $currentId, $nav);
                $nav .= "</ul></li>";
            } else {
                if ($value["menu_id"] == $currentId) {
                    $nav .= '<li class="current"><a href="' . $value["url"] . '">' . $value["menu_id"] . $value["title"] . '</a></li>';
                } else {
                    $nav .= '<li><a href="' . $value["url"] . '">' . $value["menu_id"] . $value["title"] . '</a></li>';
                }
            }
        }
    }
    return $nav;
}
$nav = getTree(0, $resArr, $parentIds, $currentId);

echo $nav;

// print_r($resArr2);
// child=首页  系统管理  栏目管理
// 遍历child 判断是否有子元素  没有简单的li  有子元素（）

// function get_currentNav($id,$data,$currentNav="") {

//     $child=getChildByParentId($id,$data);

//     if(is_array($child)){
//         foreach ($child as $key => $value) {
//             //将当前的item 的id 传入，获取子元素，判断资源苏是否存在
//            $child2=getChildByParentId($value["menu_id"],$data);
//            if(empty($child2)){
//                 $currentNav.="<li><a href=''>".$value["title"]."</a>";
//            }else{
//                 $currentNav.="<li><a href=''>".$value["title"]."</a>"

//            }
//         }
//     }
//     return $currentNav;

// }

?>
