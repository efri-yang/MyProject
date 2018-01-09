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
	<title>管理后台——权限详情页</title>
	<?php  @include("./include/styleScript.php");?>
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/layer/layer.js"></script>
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
					<p class="tit fl">权限详情</p>
				</div>
						
				<div class="ml20 mr20 pt30">
					<div class="bg-fff">
						<div class="bg-fff">
						<div class="perssion-add-form">
							<form class="form-horizontal" action="permissionEditDo.php?id=<?php echo $uid;?>" method="post">
								<div class="form-group">
							        <label class="col-sm-2 control-label">权限所属目录</label>
							        <div class="col-sm-5">
							        	<!-- 
											用id 通过 perssion 获取权限的 父权限 添加select 展示出来
							        	 -->
							        	<?php
							        		$sql="select * from perssion";
							        		$res=$mysqli->query($sql);
							        		while ($row=$res->fetch_assoc()) {
							        			$resData[]=$row;
							        			if($row["id"]==$uid){
							        				$currData=$row;
							        			}
							        		}


							        		$tree=new Tree();
							        		$resHData=$tree->hTree($resData);

							        			// print_r($resHData);

							        		function displayPerssion($data,$pid,$str="",$step=1){
							        			foreach ($data as $key => $v) {
							        				$emptyholer=@str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$step);
							        				$selected=($v["id"]==$pid) ? "selected" :"";
							        				echo $v["id"];
							        				$str.='<option '.$selected.' value="'.$v["id"].'">'.$emptyholer."|—".$v['name'].'</option>';
							        				if(count($v["sub"])){
							        					$str=displayPerssion($v["sub"],$v["id"],$str,$step+1);
							        				}
							        			}
							        			
							        			return $str;

							        		}
							        		
							        	?>
							          	<select class="form-control perssion-add-sel" name="pparentid">
							          		<option value="0"  <?php echo $currData["pid"]==0 ? "selected":""; ?>>|—顶级权限</option>
											<?php echo displayPerssion($resHData,$currData["pid"],$str=""); ?>
											
							          	</select>
							        </div>
							    </div>

								<div class="form-group">
							        <label class="col-sm-2 control-label">权限名称</label>
							        <div class="col-sm-5">
							          <input type="text" name="pname" class="form-control" placeholder="权限名称" value="<?php echo $currData['name']; ?>" />
							        </div>
							    </div>


							    <div class="form-group">
							        <label class="col-sm-2 control-label">权限文件名</label>
							        <div class="col-sm-5">
							          <input type="text" name="pfilename"> class="form-control" placeholder="类方法名" value="<?php echo $currData['url']; ?>" />
							        </div>
							    </div>

							    <div  class="form-group">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-5">
										<input type="submit" value="保存" class="btn btn-lg btn-success mr20" />
										
									</div>
							    </div>    
							</form>
							<div class="pb30"></div>
						</div>
						
					</div>
						
						
					</div>
				</div>		
			</div>
		</div>


</body>
</html>