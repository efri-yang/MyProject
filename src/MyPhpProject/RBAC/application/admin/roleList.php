<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");
    $urlFileName=getUrlFileName();

    $roleSql="select role.id,role.name,role.pid from role inner join user_role on role.id=user_role.uid where user_role.uid=$userId";
    $roleRes=$mysqli->query($roleSql);
    while ($row=$roleRes->fetch_assoc()) {
    	$roleData=$row;
    }

   
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理后台——角色列表</title>
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
					<p class="tit fl">角色列表</p>
					<a href="roleAdd.php" class="btn btn-success fr mt15">添加角色</a>
				</div>
				<div class="pl20 pr20 pt20">
					<div class="bg-fff">
						<!-- 
							
							对于比自己高级的角色 (不显示出来)
							跟自己同等级的角色进行飘红 但是可查看 不可修改
						 -->
						<table class="role-list-tbl">
							<thead>
								<tr>
									<th>名称</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								
								<tr>
									<td><?php echo $roleData['name']."<span style='color:#f60;font-weight:bold;'>(自身角色)</span>" ?></td>
									<td>
										<a href="roleInfo.php?id=<?php echo $roleData['id']; ?>" class="btn btn-info mr10">查看</a>
										<a href="roleEdit.php?id=<?php echo $roleData['id']; ?>" class="btn btn-info mr10">修改</a>
									</td>
								</tr>

								<?php



									$sql="select * from role";
									$res=$mysqli->query($sql);
									while ($row=$res->fetch_assoc()) {
										$resData[]=$row;
									}



									
							
                                    $tree=new Tree();
                                    $resHData=$tree->vTree($resData,$roleData['id']);

                                    foreach ($resHData as $key => $v) {
                                ?>
									<tr>
										<td><?php echo $v['name']; ?></td>
										<td>
											<a href="roleInfo.php?id=<?php echo $v['id']; ?>" class="btn btn-info mr10">查看</a>
											<a href="roleEdit.php?id=<?php echo $v['id']; ?>" class="btn btn-info mr10">修改</a>
											<a href="roleDelDo.php?id=<?php echo $v['id']; ?>" class="btn btn-danger">删除</a>
										</td>
									</tr>

                                <?php    	
                                    }
                                   
                                        
                                ?>
                          
								
								
							</tbody>
						</table>
						<!-- 
							定义 显示页数 $viewNum=5
							判断 总页数
								如果 小于 5 那么全部显示

						 -->
						<?php 
			$start=1;
			$end=$totalPage;
			$page_banner="<div class='com-pagination-box'>";
			if($pageNum>1){
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1' class='first'>首页</a>";
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($pageNum-1)."' class='prev'>上一页</a>";
			}else{
				$page_banner.="<a href='javascript:void(0)' class='first disabled'>首页</a>";
				$page_banner.="<a href='javascript:void(0)' class='prev disabled'>上一页</a>";
			}

			if($totalPage > $pageShowFixLen){
				//例如 显示... 23456 ... 总页数一定要大于 5
				
				//当前页大于 3的时候=4  那么就是... 45678
				if($pageNum > $pageOffset+1){
					$page_banner.="<span>...</span>";
				}
				//3 4 5.....
				if($pageNum > $pageOffset){
					$start=$pageNum-$pageOffset;
					$end=$totalPage > $pageNum+$pageOffset ? $pageNum+$pageOffset :$totalPage;
				}else{
					$start=1;
					$end=$totalPage > $pageShowFixLen ? $pageShowFixLen : $totalPage;
				}

				if(($pageOffset+$pageNum) > $totalPage){

					$start=$start-($pageNum+$pageOffset-$end);
					$end=$totalPage;
				}
			}
			for($i=$start;$i<=$end;$i++){
				if($pageNum==$i){
					$page_banner.="<span class='current'>{$i}</span>";
				}else{
					$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
				}
			}

			if($totalPage >$pageShowFixLen && $totalPage > ($pageNum+$pageOffset)){
				$page_banner.="<span>...</span>";
			}

			if($pageNum <$totalPage){
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($pageNum+1)."' class='next'>下一页</a>";
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".$totalPage."' class='last'>尾页</a>";
			}else{
				$page_banner.="<a href='javascript:void(0)' class='next disabled'>下一页</a>";
				$page_banner.="<a href='javascript:void(0)' class='last disabled'>尾页</a>";
			}
			
			$page_banner.="<span>共".$totalPage."</span>";
			$page_banner.="<form class='pageform' action='page1.php' method='post'>";
			$page_banner.="<span>到 <input type='text' size='2'>页</span><input type='submit' value='确定' />";
			$page_banner.="</form>";
			$page_banner.="</div>";
			echo $page_banner;
		 ?>
					</div>
				</div>
			</div>

	  </div>
</body>
</html>