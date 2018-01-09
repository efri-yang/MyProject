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
	<title>管理后台——权限列表</title>
	<?php  @include("./include/styleScript.php");?>
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/layer/layer.js"></script>
</head>
<body>
		<?php
			checkPermission($userId,$urlFileName);	
		?>
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
					<p class="tit fl">权限列表</p>
					<a href="permissionAdd.php" class="btn btn-success fr mt15">添加权限</a>
				</div>
						
				<div class="ml20 mr20 pt30">
					<div class="bg-fff">
						<ul class="perssion-list-hd clearfix">
							<li class="item-1">权限名</li>
							<li class="item-2">操作</li>
						</ul>
						<div class="perssion-list-tree">
							<?php
								//要获取权限，然后生成tree 的数据格式 然后显示出来
								$sql="select * from perssion";
								$perssionRes=$mysqli->query($sql);
								$perssionResData=[];
								while ($row=$perssionRes->fetch_assoc()) {
									$perssionResData[]=$row;	
								}
								$Tree=new Tree();
								$perssionHData=$Tree->hTree($perssionResData);

								
								function dispalyPerssion($data,$pid=0,$step=1,$str=""){
							        $str.="<ul>";
							        $paddingLeft=30*$step."px";

							        foreach ($data as $k => $v) {
							            $subLen=count($v["sub"]);
							            $str.="<li class='clearfix'><div class='item-info' style='padding-left:".$paddingLeft."'><p class='name'>".$v["name"]."</p><div class='handle'><a href='permissionInfo.php?id=".$v["id"]."' class='btn btn-info'>查看</a><a href='permissionEdit.php?id=".$v["id"]."' class='btn btn-info'>修改</a><a href='permissionDelDo.php?id=".$v["id"]."' class='btn btn-danger'>删除</a></div></div>";
							            
							            if($subLen){
							                $str=dispalyPerssion($v["sub"],$v['id'],$step+1,$str);
							            }
							            $str.="</li>";
							        }
							        $str.="</ul>";
							        return $str;
							    }
							    echo dispalyPerssion($perssionHData);
							?>
							
						</div>
						
					</div>
				</div>		
			</div>
		</div>


</body>
</html>