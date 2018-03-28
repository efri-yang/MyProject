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

//获取id 对应的父元素

function getParentId($id, $data, $arr = array()) {
    foreach ($data as $key => $value) {
        //刷选当前id 对应的父id
        if ($value["menu_id"] == $id) {
            if (!!$value["parent_id"] && $value["parent_id"] != 0) {
                $pid = $value["parent_id"];
                $arr[] = $pid;
                $arr = getParentId($pid, $data, $arr);
            }
        }
    }
    return $arr;
}

function get_currentNav() {

}

?>
