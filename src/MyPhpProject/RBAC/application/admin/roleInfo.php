<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");
    $urlFileName=getUrlFileName();

    $uid=$_GET["id"];
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
        include("./include/header.php");
    ?>
    <div class="com-layout-container">
		<div class="com-layout-aside">
			<div class="aside-nav-list">
			    <?php
                    include("./include/aside.php");
                    echo  dispalyAside($asideData,$urlFileName); 
                ?>
		    </div>
		</div>
		<div class="com-layout-content">
			<div class="bread-nav-box clearfix">
				<p class="tit fl">角色信息</p>
				<a href="userAdd.php" class="btn btn-success fr mt15">添加角色</a>
			</div>
			<div class="ml20 mr20 pt30 bg-fff">
					<div class="role-edit-form">
						<?php
							$sql="select role.name as rolename,forbidden,perssion.id,perssion.pid,perssion.name as pname from role inner join user_role on role.id=user_role.uid inner join perssion_role on user_role.rid=perssion_role.rid inner join perssion on perssion_role.pid=perssion.id where user_role.uid=$uid";
							$res=$mysqli->query($sql);
							while ($row=$res->fetch_assoc()) {
								$resData[]=$row;
								$roleName=$row["rolename"];
							}

							$tree=new Tree();
							$resHData=$tree->hTree($resData);

							function displayRolePerssion($data,$str="",$hasSub=false,$step=0){
								$str.='<div class="role-perssion-tree '.(!!$hasSub ? "sub" :"").'">';
								foreach ($data as $key => $v) {
									$str.='<p class="item"><label><input '.(!!$v["forbidden"] ? "" :"checked").' type="checkbox" class="ipt-checkbox" name="perssionid[]" value="'.$v["id"].'"  disabled />'.$v['pname'].'</label></p>';
									if(count($v["sub"])){
										$str=displayRolePerssion($v["sub"],$str,true,$step+1);
									}
								}
								$str.="</div>";
								return $str;
							}

						?>
						<div class="form-horizontal">
							<div class="form-group">
						        <label class="col-sm-1 control-label">角色名称</label>
						        <div class="col-sm-5">
						          <input type="text" class="form-control" placeholder="角色名称" value="<?php echo $roleName; ?>" disabled>
						        </div>
						    </div>


						    <div class="form-group">
						        <label class="col-sm-1 control-label">角色权限</label>
						        <div class="col-sm-8">

						          	<div class="role-perssion-list">
						          		<?php echo  displayRolePerssion($resHData); ?>
										
						          	</div>
						        </div>
						    </div>  

						    <div class="form-group">
						        <label class="col-sm-1 control-label"></label>
						        <div class="col-sm-5">
						        	<a  href="roleEdit.php?id=<?php echo $uid;  ?>" class="btn btn-success btn-lg pl30 pr30">编辑</a>
						        	
						        </div>
						    </div> 
						</div>
						<div class="pb30"></div>
					</div>
				</div>
		</div>
	</div>
</body>
</html>