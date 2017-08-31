<?php
session_start();
$adminId = $_SESSION["aId"];
if (!isset($adminId)) {
    header("Location:adminlogin.php");
}
include("../libs/mysql.func.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>投票主题删除页面</title>
    <link rel="stylesheet" type="text/css" href="./css/base.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php
        $id=$_GET["id"];
        if(isset($id)){
            $sql="delete from theme where id='$id'";
            $result=$mysqli->query($sql);

            if($mysqli->affected_rows){
        ?>
                <div class="container">
                    <div class="row">
                            <h1>删除成功！<h1>
                            <script>
                            setTimeout(function(){
                                window.location.href = "./index.php?paget=theme";
                            },1500)
                            </script>
                    </div>
                </div>
        <?php        
            }
        }else{
        ?>
            <div class="container">
                    <div class="row">
                            <h1>删除失败！<h1>
                            <script>
                            setTimeout(function(){
                                window.history.back();
                            },1500)
                            </script>
                    </div>
                </div>
        <?php
        }
    ?>
</body>
</html>





