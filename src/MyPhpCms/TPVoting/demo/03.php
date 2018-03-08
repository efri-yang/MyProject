<?php
$arr = array(
    1 => array(
        "id" => 1,
        "pid" => 0,
    ),
    2 => array(
        "id" => 2,
        "pid" => 1,
    ),
    3 => array(
        "id" => 3,
        "pid" => 2,
    ),
    4 => array(
        "id" => 4,
        "pid" => 0,
    ),
    5 => array(
        "id" => 5,
        "pid" => 0,
    ),
    6 => array(
        "id" => 6,
        "pid" => 2,
    ),
);
function get_child($id) {
    global $arr;
    $resArr = array();
    foreach ($arr as $k => $v) {
        if ($v["pid"] == $id) {
            $resArr[] = $v;
        }
    }
    return $resArr;
}

// function get_tree($id) {
//     $child = get_child($id);
//     $number = 0;
//     if (is_array($child)) {
//         foreach ($child as $k => $v) {
//             $number++;
//             echo $number;
//             get_tree($v["id"]);

//         }
//     }
// }

// get_tree(0) //111223
// 递归的执行方式 其实要看成从最里面的那个元素开始执行，向外执行 第一个元素的子元素的子元素进行遍历

function get_tree($id) {
    $child = get_child($id);
    $number = 0;
    if (is_array($child)) {
        foreach ($child as $k => $v) {
            get_tree($v["id"]);
            $number++;
            echo $number;
        }
    }
}

get_tree(0) //121123

?>