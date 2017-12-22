<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php"); 

    $action=$_GET["action"];
    //这方式会出现的问题是：我在页面上还要进行实例化，显然是错误的方式，
    //正方的方式 action 是 homeIndex 的时候，那么 实例化 Home  然后调用index 方法
    if(!$action || $action=="homeIndex"){
        header('Location:admin.php?action=homeIndex');
    }

    if($action=="articleIndex"){
        $page=$_GET["page"];
        $page=!!$page ? $page : 1;
        header("Location:articleIndex.php?action=articleIndex&page=".$page);
    }

    if($action=="userEdit"){
        $id=$_GET["id"];
        header("Location:articleIndex.php?action=articleIndex&page=".$page);
    }

?>
