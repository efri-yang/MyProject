<?php
include("../../config.php");
$uid=$_REQUEST["uid"];


function getUniName(){
    return md5(uniqid(microtime(true),true));
}

$date=date("Y-m-d");
$uploadDir = ROOT_PATH."/public/uploads/avatars/".$date."/";

if (!file_exists($uploadDir)) {
    !mkdir($uploadDir, 0777, true) && exit('目录建立失败');
}


if (isset($_REQUEST["name"])) {
    $fileName = $_REQUEST["name"];
}elseif (!empty($_FILES)) {
    $fileName = $_FILES["file"]["name"];
}

$ext=@strtolower(end(explode(".",$fileName)));
$uniName=md5(uniqid(microtime(true),true)).".".$ext;
$filePath=$uploadDir.$uniName;
$filePathRelative="/public/uploads/avatars/".$date."/".$uniName;


if(@move_uploaded_file($_FILES["file"]["tmp_name"],$filePath)){
    $filePath=addslashes($filePath);
    $sql="update user set avatar='$filePathRelative' where id='$uid'";
    $result=$mysqli->query($sql);
    if($mysqli->affected_rows >= 0){
        echo json_encode(array("url"=>$filePathRelative,"uid"=>$uid));
    }else{
        echo 0;
    }
 }else{
   echo json_encode(array("url"=>$filePathRelative,"uid"=>$uid));
 }



// Return Success JSON-RPC response
