<?php

	include("./Path.php");
	include("./common/mysqli.php");
	date_default_timezone_set('PRC');//设置中国时区
	
	$username=$_POST["username"];//用户名
	$pwd=$_POST["pwd"];//密码
	$confirmPwd=$_POST["confirmPwd"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$sex=$_POST["sex"];
	$occupation=implode($_POST["occupation"],","); //职业
	$regtime=time();
	$regip=$_SERVER['REMOTE_ADDR'];
	

	



	//前台要验证 后端也要验证
	$resError;

	if(empty($username) || strlen($username) < 3 || strlen($username) >16){
		$resError="您的用户名需要3~16个字符！";
	}else if(empty($pwd) || strlen($pwd) < 6 || strlen($pwd) > 8){
		$resError="您的密码需要6~8个字符！";
	}else if(empty($confirmPwd) || $confirmPwd !== $pwd){
		$resError="您的两次密码输入不一致！";
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
		header("location:register.php");
	}else{
		$md5Pwd=md5($pwd);
		if($sex=="男"){
			$sexInteger=1;
		}else if($sex=="女"){
			$sexInteger=2;
		}else{
			$sexInteger=3;
		}

		
		$data=array("username"=>$username,"password"=>$md5Pwd,"email"=>$email,"phone"=>$phone,"sex"=>$sexInteger,"occupation"=>$occupation,"reg_time"=>$regtime,"reg_ip"=>$regip);
		$id=$db->insert("user",$data);
		if($id){
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
	<h1>恭喜您注册成功！</h1>
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
			window.location.href="<?php echo APP_ROOT_URL."/login.php" ?>"
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
	<h1>您注册失败成功！</h1>
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
			window.location.href="<?php echo APP_ROOT_URL."/register.php" ?>"
		}else{
			num--;
			countElem.innerHTML=num;
			Timer=setTimeout(timereduce,1000);

		}

	}
	// Timer=setTimeout(timereduce,1000);
</script>
<?php
		}
	}
}
	

?>




