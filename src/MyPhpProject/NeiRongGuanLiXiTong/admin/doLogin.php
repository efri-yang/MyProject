<?php

session_start();
include("../config.php");
include(ROOT_PATH."/include/mysqli.php");
include(ROOT_PATH."/admin/common/common.func.php");



$authCode = $_SESSION["authcode"];

$username = $_POST["username"];
$pwd      = $_POST["password"];
$yzm      = $_POST["yzm"];

$resError;

if (empty($username)) {
    $resError = "请输入用户名";
} elseif (empty($pwd)) {
    $resError = "请输入密码";
} elseif (empty($yzm) || $yzm != $authCode) {
    $resError = "请输入正确的验证码";
} else {
  	$sql="select * from admin where username='".$username."' and password='".md5($pwd)."'";
   
    $result =$mysqli->query($sql);
    $resultData=resultToArray($result);
    if (count($result->num_rows) == 0) {
        $resError = "您输入的用户名或者密码有误！";
    }
}

if (@$_REQUEST["type"] == "ajax") {
    echo !!@$resError ? $resError : 0;
} else {
	if(!$resError){
		$_SESSION["userid"]=$resultData[0]["id"];
		handleResult(1,"登录成功！","index.php",50);
	}else{
		handleResult(0,"登录失败！","login.php",20);
	}
   
}

?>
