<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");
    $urlFileName=getUrlFileName();

    $rolename=$_POST["rolename"];
    $perssionId=$_POST["perssionid"];
    $roleId=$_POST["roleid"];
    $uid=$_POST["id"];

    $sql="select * from perssion_role where rid=$roleId";

    $resAllR=$mysqli->query($sql);
    while($row=$resAllR->fetch_assoc()){
    	$resAllRData[]=$row;
    }
    $sqlu.="update perssion_role set forbidden=CASE pid ";
    foreach ($resAllRData as $key => $value) {
    	 if(in_array($value["pid"],$perssionId)){
    	 	 $sqlu.= sprintf("WHEN %d THEN %d ", $value["pid"],0); // 拼接SQL语句
    	 }else{
    	 	$sqlu.= sprintf("WHEN %d THEN %d ", $value["pid"],1); // 拼接SQL语句
    	 }
    }
    $sqlu .= "END WHERE rid=$roleId";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理后台——角色编辑
	提交页面</title>
	<?php  @include("./include/styleScript.php");?>
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/layer/layer.js"></script>
</head>
<body>
	
		<?php
			
			$updateFlag=true;
			$sql01="update role set name='$rolename' where id='$roleid'";
			

			
		
			$mysqli->begin_transaction();

			$result01=$mysqli->query($sql01);
			if(!$result01){
				$updateFlag=false;
				$mysqli->rollback();
			}
			$result02=$mysqli->query($sqlu);

			if(!$result02){
			
				$updateFlag=false;
				$mysqli->rollback();
			}

			$mysqli->commit();
			$mysqli->close();

			if($updateFlag){
				resultDrawGuide(1,"修改成功！","roleList.php");
			}else{
				resultDrawGuide(0,"修改失败！","roleEdit.php?id=$uid");
			}
		?>


</body>