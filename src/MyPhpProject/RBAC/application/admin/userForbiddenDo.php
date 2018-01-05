<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");


    $uid=$_GET["id"];

    $sql="select forbidden from user where id='$uid'";
    $result=$mysqli->query($sql);
    $resultData=$result->fetch_assoc();

    $resultData["forbidden"]=($resultData["forbidden"]==1) ? 0 : 1;


    $sql="update user set forbidden=".$resultData["forbidden"]." where id='$uid'";
    $result=$mysqli->query($sql);

    if($result){
    	echo json_encode(array("error"=>0,"data"=>array("forbidden"=>$resultData["forbidden"])));
    }else{
    	echo json_encode(array("error"=>0));
    }



?>