<?php
session_start();
include("../Path.php");
include("../common/mysqli.php");
include("./common/common.func.php");
    $userId=$_SESSION['userid'];
    $avatarFile=$_FILES["avatarfile"];
    $avatarFilePre=$_POST['avatarfilepre'];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $sex=$_POST["sex"];
    $occupation=$_POST["occupation"];
    $avatarName=$avatarFile['name'];

    if(!!count($occupation)){
        $occupation=implode(",",$occupation);
    }
    
    $path="avatar";
    $resError;
    $avatarUrl;

    if($avatarFile['name']){
        //用户有上传文件
        $maxSize=10240000;
        $allowMime=array('jpeg','png','gif');
        $ext=@strtolower(end(explode(".",$avatarName)));

        if($avatarFile["error"]==0){
            if($avatarFile["size"] > $maxSize){
                $fileError="文件上传尺寸过大！";
            }elseif (!in_array($ext,$allowMime)) {
                $fileError="请上传合法的文件！";
            }elseif(!is_uploaded_file($avatarFile['tmp_name'])){
                $fileError="文件不是通过http post 上传上来的";   
            }elseif(!getimagesize($avatarFile["tmp_name"])){
                $fileError="文件不是通过http post 上传上来的";
            }elseif(!file_exists($path)){
                mkdir($path,0777,true);
                chmod($path,0777);   
            }
            $uniName=md5(uniqid(microtime(true),true)).".".$ext;
            $destination=$path."/".$uniName;
            if(!move_uploaded_file($avatarFile["tmp_name"],$destination)){
                 $fileError="文件上传失败！";
            }else{
                $avatarUrl=$uniName;
            }


        }else{
            switch($avatarFile["error"]){
              case 1:
                  $fileError="上传文件超过了php配置文件中upload_max_filesize选项的值";
                  break;
              case 2:
                  $fileError="超过了表单max_file_size限制的大小";
                  break;
              case 3:
                  $fileError="文件部分上传";
                  break;
              case 4:
                  $fileError="没有选择上传文件";
                  break;
              case 6:
                 $fileError="没有找到临时目录";
                 break;
              case 7:
              case 8:
                  $fileError="系统错误";
                  break;            
           } 
        }
    }else{
        $avatarUrl=$avatarFilePre;
    }


    if($avatarFile['name'] && !empty($avatarUrl) && $fileError){
        $resError=$fileError;
    }elseif(empty($username) || strlen($username) < 3 || strlen($username) >16){
        $resError="您的用户名需要3~16个字符！";
    }else if(empty($email) || !preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((.[a-zA-Z0-9_-]{2,3}){1,2})$/", $email)){
        $resError="请输入正确的邮箱地址！";
    }else if(empty($phone) || !preg_match("/^0?1[3|4|5|6|7|8][0-9]\d{8}$/",$phone)){
        $resError="请输入正确的手机号码！";
    }elseif(empty($sex)){
        $resError="请选择性别！";
    }elseif(empty($occupation)){
        $resError="请选择职业！";
    }


    if(@$_REQUEST["type"]=="ajax"){
        echo !!@$resError ? $resError : 0;
    }else{

        if(!!@$resError){
?>
    <style type="text/css">
    .doregister-box-success{
        text-align: center;
        margin-top: 80px;
    }

    .doregister-box-success h1{
        text-align: center;
        font-size: 32px;
        color:green;
        font-weight: bold; 
    }
</style>
    <div class="doregister-box-fail">
    <h1><?php echo $resError; ?></h1>
    <p>页面将在<span id="timecount"></span>秒之后跳转！<a href="register.php">手动点击重新注册！</a></p>
</div>
<script type="text/javascript">
    var countElem=document.getElementById("timecount");
    var num=3;
    var Timer; 
    countElem.innerHTML=num;
    function timereduce(){
        clearTimeout(Timer);
        if(num<=1){
            window.location.href="userInformation.php?type=edit";
        }else{
            num--;
            countElem.innerHTML=num;
            Timer=setTimeout(timereduce,1000);

        }

    }
    Timer=setTimeout(timereduce,1000);
</script>


<?php        

           
        }else{
            if($sex=="男"){
                $sexInteger=1;
            }else if($sex=="女"){
                $sexInteger=2;
            }else{
                $sexInteger=3;
            }

            $sql="update admin set username='$username',email='$email',phone='$phone',sex='$sexInteger',occupation='$occupation',avatar='$avatarUrl' where id='$userId'";




           
            $result=$mysqli->query($sql);
            if($mysqli->affected_rows){
?>
<style type="text/css">
    .doregister-box-success{
        text-align: center;
        margin-top: 80px;
    }

    .doregister-box-success h1{
        text-align: center;
        font-size: 32px;
        color:green;
        font-weight: bold; 
    }
</style>

<div class="doregister-box-success">
    <h1>修改成功！</h1>
    <p>页面将在<span id="timecount"></span>秒之后跳转！<a href="#">手动点击跳转！</a></p>
</div>
<script type="text/javascript">
    var countElem=document.getElementById("timecount");
    var num=3;
    var Timer; 
    countElem.innerHTML=num;
    function timereduce(){
        clearTimeout(Timer);
        if(num<=1){
            window.location.href="userInformation.php"
        }else{
            num--;
            countElem.innerHTML=num;
            Timer=setTimeout(timereduce,1000);

        }

    }
    Timer=setTimeout(timereduce,1000);
</script>
<?php
        }else{
?>

<style type="text/css">
    .doregister-box-fail{
        text-align: center;
        margin-top: 80px;
    }

    .doregister-box-fail h1{
        text-align: center;
        font-size: 32px;
        color:red;
        font-weight: bold; 
    }
</style>
<div class="doregister-box-fail">
    <h1>修改失败！</h1>
    <p>页面将在<span id="timecount"></span>秒之后跳转！<a href="register.php">手动点击重新注册！</a></p>
</div>
<script type="text/javascript">
    var countElem=document.getElementById("timecount");
    var num=3;
    var Timer; 
    countElem.innerHTML=num;
    function timereduce(){
        clearTimeout(Timer);
        if(num<=1){
            window.location.href="userInformation.php?type=edit";
        }else{
            num--;
            countElem.innerHTML=num;
            Timer=setTimeout(timereduce,1000);

        }

    }
    Timer=setTimeout(timereduce,1000);
</script>
<?php                
            }
        }
    }






   


?>