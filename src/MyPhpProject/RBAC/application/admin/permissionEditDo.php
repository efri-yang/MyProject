<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");
    $urlFileName=getUrlFileName();
    $uid=$_GET["id"];
    $pid=$_POST["pparentid"];
    $pname=$_POST["pname"];
    $pfilename=$_POST["pfilename"];0  
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理后台——权限提交页面</title>
	<?php  @include("./include/styleScript.php");?>
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/layer/layer.js"></script>
</head>
<body>
	
		<?php
			$sql="update perssion set name=$pname,pid=$pid,$url=$pfilename where id=$uid";
			$res=
		?>


</body>
</html>