<?php
    include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
    $userId=$_SESSION["userid"];
    sessionDrawGuide($userId,"login.php");
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理后台——用户信息列表</title>
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
					<p class="tit fl">用户列表</p>
					<a href="userAdd.php" class="btn btn-success fr mt15">添加用户</a>
				</div>
				<div class="pl20 pr20 pt20">
					<div class="bg-fff">
						<table class="user-list-tbl">
							<thead>
								<tr>
									<th>名称</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<?php
									 $sql="select user.id,user.username,role.id as rid,role.pid from user inner join user_role on user_role.uid=user.id inner join role on user_role.rid=role.id";

    								$result=$mysqli->query($sql);
								    while ($row=$result->fetch_assoc()) {
								    	if($row["id"]==$userId){
								    		$referArr=$row;
								    		
								    	}
								    	$resRoleData[]=$row;
								    	
								    }
								   $tree=new Tree();
								   //进行数据的树形排序，然后通过pid 来获取当前用户角色下的用户78

								   $roleChildHData=$tree->vTree($resRoleData,$referArr["id"]);
									foreach ($roleChildHData as $key => $value) {
								?>
								<tr>
									<td><?php echo $value['username'] ?></td>
									<td>
										<a href='<?php echo "userInfo.php?id=".$value['id'];?>' class="btn btn-info mr10">查看</a>
										<a href='<?php echo "userEdit.php?id=".$value['id'];?>' class="btn btn-info mr10">修改</a>

										<a href='<?php echo "userForbiddenDo.php?id=".$value['id'];?>' class="btn btn-info mr10 btn-forbidden"><?php echo !!$value["forbidden"] ? "启用" : "禁用"; ?></a>
										<a href="userDelDo.php?id=<?php echo $value['id']; ?>" class="btn btn-danger">删除</a>
									</td>
								</tr>
								<?php		
									}
								?>
							</tbody>
						</table>
						<script type="text/javascript">
							$(function(){
								$(document).on("click",".btn-forbidden",function(event){
									event.preventDefault();
									var $this=$(this);
									
									var href=$this.attr("href");
									$.ajax({
										url:href,
										dataType:"json",
										success:function(respone){
											/**
											 * {
											 * 	error:0
											 * 	data:{
											 * 		forbidden:0
											 * 	}
											 * }
											 */
											if(!!respone.error){
												layer.msg("出错啦！！");
											}else{
												if(!!respone.data.forbidden){
													
													$this.html("启用");
													layer.msg("禁用成功！");
												}else{
													$this.html("禁用");
													layer.msg("开启成功！")
												}
											}
											
										}
									})
								})
							})
						</script>
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