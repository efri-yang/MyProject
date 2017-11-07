<?php
	session_start();
	include("../../config.php");
	include(ROOT_PATH."/include/mysqli.php");
	include(ROOT_PATH."/admin/common/session.php");
	include(ROOT_PATH."/admin/common/common.func.php");

	$classId=$_REQUEST['classid'];

	echo $classId;

	$sql='delete from mc_columns where classid="'.$classId.'"';
	$result=$mysqli->query($sql);
	if($mysqli->affected_rows){
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
			<h1>删除成功！</h1>
			<p>页面将在<span id="timecount"></span>秒之后跳转！<a href="index.php">手动点击跳转！</a></p>
		</div>
		


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
	<h1>删除失败！</h1>
	<p>页面将在<span id="timecount"></span>秒之后跳转！<a href="register.php">手动点击跳转！</a></p>
</div>


<?php
	}

?>
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