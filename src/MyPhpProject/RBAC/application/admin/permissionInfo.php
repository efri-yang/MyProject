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
							<form class="form-horizontal">
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
							        				$pid=$row['pid'];
							        			}
							        		}
							        		$tree=new Tree();
							        		$resHData=$tree->hTree($resData);


							        		function displayPerssion($data,$str="",$step=0){
							        			foreach ($data as $key => $v) {
							        				$emptyholer=@str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$step);
							        				$selected=($v["id"]==$pid) ? "selected" :"";
							        				$str.='<option '.$selected.' value="'.$v["id"].'">'.$emptyholer."|—".$v['name'].'</option>';
							        				if(count($v["sub"])){
							        					$str.=displayPerssion($v["sub"],$step+1,$str);
							        				}
							        			}
							        			
							        			return $str;

							        		}
							        		
							        	?>
							          	<select class="form-control">
							          		<option value="0">|—顶级权限</option>
											<?php echo displayPerssion($resHData,$str=""); ?>
											
							          	</select>
							        </div>
							    </div>

								<div class="form-group">
							        <label class="col-sm-2 control-label">权限名称</label>
							        <div class="col-sm-5">
							          <input type="text" class="form-control" placeholder="权限名称" value="权限x1">
							        </div>
							    </div>


							    <div class="form-group">
							        <label class="col-sm-2 control-label">权限文件名</label>
							        <div class="col-sm-5">
							          <input type="text" class="form-control" placeholder="类方法名" value="quanxian01">
							        </div>
							    </div>

							    <div  class="form-group">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-5">
										<input type="submit" value="修改" class="btn btn-success mr20" />
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