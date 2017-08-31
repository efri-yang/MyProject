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
    <title>投票主题添加修改——处理页面</title>
    <link rel="stylesheet" type="text/css" href="./css/base.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php  
    if (!isset($_POST["title"])) {
?>
        <div class="container">
            <div class="row">
                <h1 style="text-align: center">标题不能为空！</h1>
                <script>
                    setTimeout(function () {
                        history.back(-1);
                    }, 1500)
                </script>
            </div>
        </div>
<?php
    }else{
        $title = $_POST["title"];
        if(isset($_GET["id"]) && !empty($_GET["id"])){
            echo $title;
            $id=$_GET["id"];
            $sql = "update theme set title='$title' where id='$id' and admin_id='$adminId'";
        }else{

            date_default_timezone_set('PRC');
            $createtime = time();
            $sql = "insert into theme(title,createtime,admin_id) values('$title','$createtime','$adminId')";
        }
        echo $title;
        $result = $mysqli->query($sql);
        if ($mysqli->affected_rows) {
?>
            <div class="container">
                <div class="row">
                    <h1 style="text-align: center">插入成功！</h1>
                    <script>
                        setTimeout(function () {
                            window.location.href = "./index.php?paget=theme";
                        }, 1500)
                    </script>
                </div>
            </div>
<?php
        }else{
?>
            <div class="container">
                <div class="row">
                    <h1 style="text-align: center">插入失败，请从新操作！</h1>
                    <script>
                        // setTimeout(function () {
                        //     history.back(-1);
                        // }, 1500)
                    </script>
                </div>
            </div>   
<?php            
        }

    }
?>
</body>
</html>





