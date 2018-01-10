<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");
    $urlFileName=getUrlFileName();

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>角色——信息</title>
	<?php  @include("./include/styleScript.php");?>
</head>
<body>
	<?php

		$roleName=$_POST["rolename"];
		$rolePid=$_POST["rolepid"];
		$pressionIdArr=$_POST["perssionid"];

		print_r($perssionid);
		foreach ($pressionIdArr as $key => $value) {
			$strSqlArr[]='((select max(id) from role),"'.$value.'",0)';
		}
		/**
		 * 数据库的事物
		 *
		 * 要将角色插入到 role 表
		 *
		 * 然后再将数据插入到 perssion_role表
		 */

		$sql01="insert into role(pid,name) values('$rolePid','$roleName')";
		$sql02="insert into perssion_role(rid,pid,forbidden) values".implode(",",$strSqlArr);

		


		$insertFlag=true;
		$mysqli->begin_transaction();


		$res01=$mysqli->query($sql01);
		if(!$res01){
			$insertFlag=false;
			$mysqli->rollback();
		}

		$res02=$mysqli->query($sql02);
		if(!$res02){
			$insertFlag=false;
			$mysqli->rollback();
		}

		$mysqli->commit();
		$mysqli->close();

		if($insertFlag){
				resultDrawGuide(1,"添加成功！","roleList.php");
			}else{
				resultDrawGuide(0,"添加失败！","roleAdd.php");
			}
		

	?>
</body>
</html>