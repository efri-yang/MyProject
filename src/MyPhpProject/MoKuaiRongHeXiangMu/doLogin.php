<?php


include("common/session.php");

	

include("./config.inc.php");
include("./common/mysqli.php");
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
  
    $db->where("username", $username);
    $db->where("password", md5($pwd));
    $result = $db->getOne("user");
    if (count($result) == 0) {
        $resError = "您输入的用户名或者密码有误！";
    }
}

if (@$_REQUEST["type"] == "ajax") {
    echo !!@$resError ? $resError : 0;
} else {
	if(!$resError){

		$_SESSION["userid"]=$result["id"];

?>		<style type="text/css">
	.dologin-box-success{
		text-align: center;
		margin-top: 80px;
	}

	.dologin-box-success h1{
		text-align: center;
		font-size: 32px;
		color:green;
		font-weight: bold;
	}
</style>
		<div class="dologin-box-success">
	<h1>恭喜您登陆成功！</h1>
	<p>页面将在<span id="timecount"></span>秒之后跳转！<a href="index.php">手动点击跳转！</a></p>
</div>
<script type="text/javascript">
	var countElem=document.getElementById("timecount");
	var num=3;
	var Timer;
	countElem.innerHTML=num;
	function timereduce(){
		clearTimeout(Timer);
		if(num<=1){
			window.location.href="index.php"
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
	.dologin-box-success{
		text-align: center;
		margin-top: 80px;
	}

	.dologin-box-success h1{
		text-align: center;
		font-size: 32px;
		color:green;
		font-weight: bold;
	}
</style>
		<div class="dologin-box-success">
	<h1>您登陆失败成功！</h1>
	<p>页面将在<span id="timecount"></span>秒之后跳转！<a href="register.php">手动点击跳转！</a></p>
</div>
<script type="text/javascript">
	var countElem=document.getElementById("timecount");
	var num=3;
	var Timer;
	countElem.innerHTML=num;
	function timereduce(){
		clearTimeout(Timer);
		if(num<=1){
			window.location.href="index.php"
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

?>
