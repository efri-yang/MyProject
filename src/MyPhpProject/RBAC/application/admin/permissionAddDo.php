<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");
    $urlFileName=getUrlFileName();

    $pid=$_POST["pparentid"];
    $pname=$_POST["pname"];
    $pfilename=$_POST["pfilename"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理后台——权限列表</title>
	<?php  @include("./include/styleScript.php");?>
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/layer/layer.js"></script>
</head>
<body>
		
		<?php
			$sql="insert into perssion(name,pid,url) values('$pname','$pid','$pfilename')";
			$res=$mysqli->query($sql);
			
			if($res->affected_rows>=0){
				resultDrawGuide(1,"添加成功!","permissionList.php");
			}else{
				resultDrawGuide(0,"添加失败!","permissionAdd.php");				
			}
		?>


</body>
</html>