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
			</div>
			<div class="ml20 mr20 pt30 bg-fff">
					<div class="role-edit-form">
						<?php
							$sql="select * from perssion";
								$perssionRes=$mysqli->query($sql);
								$perssionResData=[];
								while ($row=$perssionRes->fetch_assoc()) {
									$perssionResData[]=$row;	
								}
								$Tree=new Tree();
								$perssionHData=$Tree->hTree($perssionResData);


							function displayRolePerssion($data,$str="",$hasSub=false,$step=0){
								$str.='<div class="role-perssion-tree '.(!!$hasSub ? "sub" :"").'">';
								foreach ($data as $key => $v) {
									$str.='<p class="item"><label><input type="checkbox" class="ipt-checkbox" name="perssionid[]" value="'.$v["id"].'" />'.$v['name'].'</label></p>';
									if(count($v["sub"])){
										$str=displayRolePerssion($v["sub"],$str,true,$step+1);
									}
								}
								$str.="</div>";
								return $str;
							}

						?>


						<form class="form-horizontal" action="roleAddDo.php" method='post'>
							<div class="form-group">
						        <label class="col-sm-1 control-label">父角色</label>
						        <div class="col-sm-5">
						        	<?php
											$sql="select * from role";
											$res=$mysqli->query($sql);
											while ($row=$res->fetch_assoc()) {
												$resData[]=$row;
											}
											foreach ($resData as $key => $value) {
												$strOption.='<option value="'.$value["pid"].'">'.$value["name"].'</option>';
											}
										?>
						         	<select class="form-control" name="rolepid">
										<?php echo $strOption; ?>
						         	</select>
						        </div>
						    </div>

							<div class="form-group">
						        <label class="col-sm-1 control-label">角色名称</label>
						        <div class="col-sm-5">
						          <input type="text" name="rolename" class="form-control" placeholder="角色名称" value="<?php echo $roleName; ?>">
						        </div>
						    </div>


						    <div class="form-group">
						        <label class="col-sm-1 control-label">角色权限</label>
						        <div class="col-sm-8">

						          	<div class="role-perssion-list">
						          		<?php echo  displayRolePerssion($perssionHData); ?>
										
						          	</div>
						        </div>
						    </div>  

						    <div class="form-group">
						        <label class="col-sm-1 control-label"></label>
						        <div class="col-sm-5">
						        	<input type="submit" value="保存"  class="btn btn-success btn-lg pl30 pr30">
						        </div>
						    </div> 
						</form>
						<div class="pb30"></div>
					</div>
				</div>
		</div>
	</div>
</body>
</html>