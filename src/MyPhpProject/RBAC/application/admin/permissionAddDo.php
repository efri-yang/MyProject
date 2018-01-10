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
			$sql="select * from role";

			$res=$mysqli->query($sql);
			while ($row=$res->fetch_assoc()) {
				$resArr[]=$row["id"];
				$forbidden=($row['pid']==0) ? 0 : 1;
				$sql02Arr[]="(".$row['id'].",(select max(id) from perssion),$forbidden)";
			}
			

			

			
			/**
			 * 权限要插入 到perssion 表中
			 * 
			 * 根据有多个角色  然后 insert into permission_role values(rid,pid,0)  管理员默认的是1
			 */
			$sql01="insert into perssion(name,pid,url) values('$pname','$pid','$pfilename')";

			$sql02="insert into perssion_role(rid,pid,forbidden) values".implode(",",$sql02Arr);

			$insertFlag=true;
			$mysqli->begin_transaction();

			$result01=$mysqli->query($sql01);
			if(!$result01){
				$insertFlag=false;
				$mysqli->rollback();
			}
			$result02=$mysqli->query($sql02);

			if(!$result02){
			
				$insertFlag=false;
				$mysqli->rollback();
			}

			$mysqli->commit();
			$mysqli->close();

			if($insertFlag){
				resultDrawGuide(1,"添加成功！","roleList.php");
			}else{
				resultDrawGuide(0,"添加失败！","roleEdit.php?id=$uid");
			}


			
			
		?>


</body>
</html>